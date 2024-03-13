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
        Schema::create('detailkamars', function (Blueprint $table) {
            $table->id();
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->string('ulasan');
            $table->string('foto');
            $table->foreignId('kamar_id')->constrained('kamars')->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailkamars');
    }
};
