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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('telp');
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->dateTime('tanggal_awal');
            $table->dateTime('tanggal_akhir');
            $table->string('metode_pembayaran');
            $table->string('invoice');
            $table->foreignId('rooms_id')->constrained('kamars')->restrictOnDelete();
            $table->bigInteger('harga_pesanan');
            $table->enum('adaulasan', ['true', 'false'])->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
