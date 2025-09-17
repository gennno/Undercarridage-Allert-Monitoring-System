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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->nullable()->constrained('units')->nullOnDelete();
            $table->string('part_number')->nullable();
            $table->string('part_name');
            $table->integer('hm_new'); // HM prima (100%)
            $table->integer('hm_current')->default(0); // HM berjalan
            $table->enum('status', ['active', 'replaced'])->default('active');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
