@extends('layouts.index')

@section('title', 'Pemesanan Kamar Hotel Pasha')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #93c0fa;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group input[type="checkbox"] {
            width: auto;
        }

        .form-group .checkbox-label {
            display: inline-block;
            margin-left: 5px;
        }

        .form-group .note {
            font-size: 0.9em;
            color: #888;
        }

        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>

    <div class="container-lg form-container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Booking Kamar</h2>
        <form action="{{ route('create_pesan') }}" method="POST" class="border-none">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="nama_pesanan">Nama Pesanan</label>
                <input type="text" id="nama_pesanan" name="nama_pesanan"
                    class="form-control @error('nama_pesanan') is-invalid @enderror" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" id="jk_lk" value="lk" required>
                    <label class="form-check-label" for="jk_lk">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" id="jk_pr" value="pr" required>
                    <label class="form-check-label" for="jk_pr">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="no_ktp">Nomor KTP</label>
                <input type="text" id="no_ktp" name="no_ktp"
                    class="form-control @error('no_ktp') is-invalid @enderror" required pattern="\d{16}"
                    title="Nomor KTP harus 16 digit angka" maxlength="16">
                <small class="note">Masukkan 16 digit nomor KTP.</small>
            </div>
            <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar</label>
                <select id="tipe_kamar" name="tipe_kamar" class="form-control" required>
                    <option value="">Select</option>
                    <option value="standar">Standar</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="family">Family</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="tgl_pesan">Tanggal Pesan</label>
                <input type="date" id="tgl_pesan" name="tgl_pesan" class="form-control" required
                    pattern="\d{1,2}/\d{1,2}/\d{4}" title="Format tanggal harus dd/mm/yyyy">
                <small class="note">Format: dd/mm/yyyy</small>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi Menginap</label>
                <input type="number" id="durasi" name="durasi"
                    class="form-control @error('durasi') is-invalid @enderror" required>
            </div>
            <div class="form-group">
                <label class="d-flex flex-row align-items-center justify-content-start">
                    <span class="checkbox-label me-2">Breakfast</span>
                    <input type="checkbox" id="breakfast" name="breakfast" value="1">
                </label>
            </div>
            <div class="form-group">
                <label for="total_bayar">Total Bayar</label>
                <input type="number" id="total_bayar" name="total_bayar" class="form-control" required readonly>
            </div>
            <a href="#hitungTotal" id="calculateTotal" onclick="return false;"
                class="btn btn-lg btn-warning btn-block fw-bold mx-auto px-10">Hitung Total Bayar</a>
            <button type="submit" class="btn btn-lg btn-primary btn-block fw-bold mx-auto px-10">Pesan</button>
            <a href="{{ route('pesan_form') }}"
                class="btn btn-lg btn-secondary btn-block fw-bold mx-auto px-10">cancel</a>
        </form>
    </div>

    <script>
        const tipeKamarSelect = document.getElementById('tipe_kamar');
        const hargaInput = document.getElementById('harga');
        const durasiInput = document.getElementById('durasi');
        const breakfastCheckbox = document.getElementById('breakfast');
        const totalBayarInput = document.getElementById('total_bayar');
        const calculateButton = document.getElementById('calculateTotal');

        const roomPrices = {
            'standar': 100000,
            'deluxe': 500000,
            'family': 1000000
        };

        function calculateTotal() {
            let harga = parseInt(hargaInput.value) || 0;
            let durasi = parseInt(durasiInput.value) || 0;
            let breakfast = breakfastCheckbox.checked ? 80000 : 0;
            let total = harga * durasi;

            if (durasi >= 3) {
                total *= 0.1;
            }

            total += breakfast * durasi;
            totalBayarInput.value = total;
        }

        tipeKamarSelect.addEventListener('change', function() {
            let selectedRoomType = tipeKamarSelect.value;
            if (roomPrices[selectedRoomType]) {
                hargaInput.value = roomPrices[selectedRoomType];
            } else {
                hargaInput.value = 0;
            }
        });

        calculateButton.addEventListener('click', calculateTotal);
    </script>
@endsection
