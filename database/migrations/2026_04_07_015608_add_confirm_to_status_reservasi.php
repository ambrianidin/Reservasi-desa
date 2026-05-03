<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    DB::statement("
        ALTER TABLE reservasis 
        MODIFY status_reservasi_wisata 
        ENUM('confirm','pesan','dibayar','selesai','batal')
    ");
}

public function down(): void
{
    DB::statement("
        ALTER TABLE reservasis 
        MODIFY status_reservasi_wisata 
        ENUM('pesan','dibayar','selesai','batal')
    ");
}
};
