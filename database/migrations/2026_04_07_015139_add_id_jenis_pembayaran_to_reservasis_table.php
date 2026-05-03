<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('reservasis', function (Blueprint $table) {
        $table->unsignedBigInteger('id_jenis_pembayaran')->nullable()->after('id_diskon');

        $table->foreign('id_jenis_pembayaran')
              ->references('id')
              ->on('jenis_pembayarans')
              ->onUpdate('cascade')
              ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('reservasis', function (Blueprint $table) {
        $table->dropForeign(['id_jenis_pembayaran']);
        $table->dropColumn('id_jenis_pembayaran');
    });
}
};
