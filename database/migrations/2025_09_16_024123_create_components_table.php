<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->string('part_number')->nullable();
            $table->string('part_name');
            $table->decimal('nilai_standar', 8, 2)->nullable();  // mm
            $table->decimal('nilai_limit', 8, 2)->nullable();    // mm
            $table->integer('hm_new')->nullable();               // HM saat pasang
            $table->integer('hm_current')->nullable();           // HM terakhir
            $table->enum('status', ['aktif', 'diganti', 'rusak'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
