<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\PesanKamar;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KamarsController extends Controller
{
    //fungsi untuk menampilkan tampilan home
    public function home()
    {
        return view('home');
    }

    //fungsi untuk menampilkan tampilan about
    public function about()
    {
        return view('about');
    }

    //fungsi untuk menampilkan halaman pesan kamar
    public function pesan_form()
    {
        return view('pesan_kamar');
    }

    //fungsi untuk menampilkan hasil
    public function pricelist()
    {
        $data = PesanKamar::orderBy('id', 'DESC')->get();

        if (!$data) return redirect()->back()->with('error', 'Data tidak ditemukan');

        $jumlahPemesanStandar = 0;
        $jumlahPemesanDeluxe = 0;
        $jumlahPemesanFamily = 0;

        // Lakukan iterasi terhadap data untuk menghitung jumlah pemesanan berdasarkan tipe kamar hotel
        foreach ($data as $client) {
            if ($client->tipe_kamar == 'standar') {
                $jumlahPemesanStandar++;
            } elseif ($client->tipe_kamar == 'deluxe') {
                $jumlahPemesanDeluxe++;
            } else {
                $jumlahPemesanFamily++;
            }
        }

        // Kirim hasil perhitungan ke tampilan menggunakan compact
        return view('pricelist', compact('data', 'jumlahPemesanStandar', 'jumlahPemesanDeluxe', 'jumlahPemesanFamily'));
    }

    //Fungsi untuk mengecek pesanan melalui id yang tersedia di database
    public function cek_pesanan($id)
    {
        try {
            $client = PesanKamar::find($id);

            if (!$client) return response()->json(['msg' => "Data tidak ditemukan"]);

            return response()->json([
                'Nama pemesan' => $client->nama_pemesanan,
                'Nomor identitas' => $client->no_ktp,
                'Jenis Kelamin' => $client->jk,
                'Tipe kamar' => $client->tipe_kamar,
                'Durasi Penginapan' => $client->durasi,
                'Breakfast' => $client->breakfast ? "Pakai" : "Tidak pakai",
                'Discount' => $client->durasi >= 3 ? "10%" : "0%",
                'Total bayar' => $client->total_bayar
            ]);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //Fungsi untuk mengecek kamar melalui id yang tersedia di database
    public function kamar($id)
    {
        try {
            $item = Kamar::find($id);

            if (!$item) return response()->json(['msg' => "Kamar tidak ditemukan"]);

            return response()->json([
                'Tipe kamar' => $item->nama,
                'Harga' => $item->harga,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //fungsi untuk memasukkan data yang sudah disubmit di form
    public function create_pesan(Request $request)
    {
        try {
            // validasi request
            $request->validate([
                'nama_pesanan' => 'required',
                'jk' => 'required',
                'no_ktp' => 'required|numeric|digits:16',
                'tipe_kamar' => 'required',
                'harga' => 'required',
                'tgl_pesan' => 'required|date',
                'durasi' => 'required',
                'total_bayar' => 'required',
            ]);

            $client = new PesanKamar();
            $client->nama_pemesanan = $request->nama_pesanan;
            $client->jk = $request->jk;
            $client->no_ktp = $request->no_ktp;
            $client->tipe_kamar = $request->tipe_kamar;
            $client->tgl_pesan = $request->tgl_pesan;
            $client->durasi = $request->durasi;

            $client->breakfast = $request->breakfast ?? 0;
            $client->total_bayar = $request->total_bayar;

            // getting kamar id to foreign key client->kamar_id
            $tipeKamar = $client->tipe_kamar;
            $kamar = Kamar::where('nama', $tipeKamar)->first();
            if ($kamar) {
                $client->kamar_id = $kamar->id;
            } else {
                Alert::error('error', "Kamar with nama '{$tipeKamar}' not found.");
                throw new \Exception("Kamar with nama '{$tipeKamar}' not found.");
            }
            $client->save();

            Alert::success('Success', 'Berhasil Booking Kamar');

            return redirect()->route('pesan_form')->with('success', 'Berhasil!');
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
