<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aturan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gejala_id')->unique()->constrained('gejala')->cascadeOnDelete();
            $table->decimal('nilai_cf_pakar', 3, 2); // bobot CF pakar untuk gejala ini (0.0 - 1.0)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aturan');
    }
};
