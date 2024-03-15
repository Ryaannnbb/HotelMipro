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
        Schema::create('pemakaian_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->restrictOnDelete();
            $table->foreignId('fasilitas_id')->constrained('fasilitas')->restrictOnDelete();
            $table->integer('jumlah_pemakaian');
            $table->decimal('harga_pemakaian', 10, 2); // 10 digit total, 2 digit di belakang koma
            // $table->date('tanggal_pemakaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaian_fasilitas');
    }
};
