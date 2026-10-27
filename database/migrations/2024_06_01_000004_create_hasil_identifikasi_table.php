<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hasil_identifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user');
            $table->unsignedTinyInteger('usia')->nullable();
            $table->string('jenis_kelamin', 20)->nullable();
            $table->decimal('nilai_cf_combine', 8, 6);
            $table->decimal('persentase', 5, 2);
            $table->foreignId('tingkat_insomnia_id')->nullable()->constrained('tingkat_insomnia')->nullOnDelete();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_identifikasi');
    }
};
