<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pesanan',
        'jk',
        'no_ktp',
        'tipe_kamar',
        'tgl_pesan',
        'durasi',
        'breakfast',
        'total_bayar',
    ];
}
