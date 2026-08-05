<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penempatan_id')->constrained('penempatan_pkl')->cascadeOnDelete();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignId('pembimbing_instansi_id')->constrained('pembimbing_instansi')->restrictOnDelete();
            
            // Komponen Nilai (0-100)
            $table->integer('nilai_kedisiplinan')->default(0);
            $table->integer('nilai_kemampuan_kerja')->default(0);
            $table->integer('nilai_komunikasi')->default(0);
            $table->integer('nilai_hasil_kerja')->default(0);
            
            $table->integer('nilai_akhir')->default(0); // Otomatis dihitung rata-rata
            $table->string('grade')->nullable(); // A, B, C, dll
            
            $table->text('evaluasi')->nullable();
            $table->string('rekomendasi')->nullable(); // Diterima/Dipertimbangkan/Ditolak untuk rekrutmen
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('penilaian');
    }
};