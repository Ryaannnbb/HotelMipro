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
            $table->foreignId('kategori_id')->constrained('kategoris')->restrictOnDelete();
            $table->string('nama_diskon');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->enum('jenis', ['nominal', 'percentage'])->default('nominal');
            $table->bigInteger('potongan_harga');
            $table->date('awal_berlaku');
            $table->date('akhir_berlaku');
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
