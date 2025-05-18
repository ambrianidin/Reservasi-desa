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
        Schema::create('diskons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_diskon', 255); 
            $table->decimal('persentase_diskon');
            $table->float('nilai_diskon')->nullable(); 
            $table->date('tanggal_mulai'); 
            $table->date('tanggal_berakhir'); 
            $table->enum('status', ['aktif', 'habis'])->default('aktif'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskons');
    }
};
