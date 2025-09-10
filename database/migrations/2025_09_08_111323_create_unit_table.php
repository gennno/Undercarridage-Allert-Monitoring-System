<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('unit_code', 50)->unique(); // kode unit
            $table->string('unit_name', 100); // nama unit
            $table->text('description')->nullable(); // deskripsi
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit');
    }
};
