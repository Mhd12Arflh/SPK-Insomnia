<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tingkat_insomnia', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique(); // P01, P02, P03
            $table->string('nama'); // Ringan, Sedang, Berat
            $table->decimal('nilai_min', 4, 2);
            $table->decimal('nilai_max', 4, 2);
            $table->decimal('persentase_min', 5, 2);
            $table->decimal('persentase_max', 5, 2);
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tingkat_insomnia');
    }
};
