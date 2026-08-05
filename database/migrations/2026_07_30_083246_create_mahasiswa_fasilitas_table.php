<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mahasiswa_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penempatan_id')->constrained('penempatan_pkl')->cascadeOnDelete();
            $table->foreignId('fasilitas_id')->constrained('fasilitas')->restrictOnDelete();
            $table->string('status')->default('diberikan'); // diberikan, belum
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('mahasiswa_fasilitas');
    }
};
