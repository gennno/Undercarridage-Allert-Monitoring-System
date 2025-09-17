<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('component_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->enum('jenis', ['measurement', 'replacement']); // tipe laporan
            $table->string('photo')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->string('pic')->nullable();                     // person in charge
            $table->integer('hm')->nullable();                     // HM saat laporan
            $table->decimal('measurement_value', 8, 2)->nullable(); // hasil pengukuran mm
            $table->decimal('percent_worn', 5, 2)->nullable();     // %
            $table->integer('lifetime_estimate')->nullable();      // jam
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
