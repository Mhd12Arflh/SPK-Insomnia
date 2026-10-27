<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hasil_identifikasi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_identifikasi_id')->constrained('hasil_identifikasi')->cascadeOnDelete();
            $table->foreignId('gejala_id')->constrained('gejala')->cascadeOnDelete();
            $table->decimal('cf_pakar', 3, 2);
            $table->decimal('cf_user', 3, 2);
            $table->decimal('cf_he', 8, 6);
            $table->unsignedInteger('urutan')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_identifikasi_detail');
    }
};
