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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('equiment_id');
            $table->string('GroupofEquipment');
            $table->string('SerialNo');
            $table->string('NameEquipment');
            $table->decimal('cost', 12, 2)->nullable();
            $table->string('location');
            $table->date('StartingDate')->nullable();
            $table->string('Status');
            $table->string('Company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
