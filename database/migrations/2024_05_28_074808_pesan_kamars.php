<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesan_kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesanan');
            $table->string('jk')->enum('lk', 'pr');
            $table->string('no_ktp');
            $table->string('tipe_kamar')->enum('standar', 'deluxe', 'family');
            $table->date('tgl_pesan');
            $table->integer('durasi');
            $table->integer('breakfast')->enum(0, 1);
            $table->integer('total_bayar');
            $table->unsignedBigInteger('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
