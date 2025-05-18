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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_diskon');
            $table->string('email');
            $table->string('nama', 255)->nullable();            
            $table->string('tgl_reservasi_wisata')->nullable(false);
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->bigInteger('total_bayar');
            $table->text('file_bukti_tf');
            $table->enum('status_reservasi_wisata', ['pesan', 'dibayar', 'selesai', 'batal']);
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('paket_wisatas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_diskon')->references('id')->on('diskons')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
