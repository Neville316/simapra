<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('periode_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('nama_periode'); // e.g., "Ganjil 2024/2025"
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('status')->default(1); // 1: Aktif, 0: Berakhir
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('periode_pkl');
    }
};