<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->nullable()->constrained('units')->nullOnDelete();
            $table->foreignId('component_id')->nullable()->constrained('components')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('jenis', ['measurement', 'replacement']);
            $table->string('part_number')->nullable();
            $table->string('photo')->nullable();
            $table->dateTime('datetime');
            $table->string('pic')->nullable(); // bisa redundant dengan user_id, kalau mau tetap simpan nama mekanik
            $table->integer('hm')->nullable(); // nilai HM saat dicatat
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
