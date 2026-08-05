<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penempatan_id')->constrained('penempatan_pkl')->cascadeOnDelete();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->date('tanggal');
            $table->text('aktivitas');
            $table->string('dokumentasi_path')->nullable(); // Path foto dokumentasi
            $table->string('status')->default('menunggu_validasi');
            $table->text('catatan_revisi')->nullable(); // Diisi pembimbing jika revisi
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('logbook');
    }
};
