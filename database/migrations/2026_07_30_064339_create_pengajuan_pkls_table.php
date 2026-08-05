<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengajuan_pkl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignId('instansi_id')->constrained('instansi')->restrictOnDelete();
            $table->date('tanggal_pengajuan');
            $table->string('status')->default('menunggu'); // Default menunggu
            $table->text('catatan')->nullable(); // Untuk catatan admin jika ditolak
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pengajuan_pkl');
    }
};