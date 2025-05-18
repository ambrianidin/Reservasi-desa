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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 50)->nullable(false);
            $table->text('alamat');
            $table->string('no_hp', 15)->nullable(false);
            $table->enum('jabatan', ['admin', 'bendahara', 'pemilik']);
            $table->enum('status', ['aktif', 'banned'])->default('aktif');
            $table->timestamps();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
