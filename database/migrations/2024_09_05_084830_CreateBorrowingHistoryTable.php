<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('borrow', function (Blueprint $table) {
        $table->id('borrow_id');  // Primary key
        $table->string('GroupofEquipment');
        $table->string('SerialNo');
        $table->string('NameEquipment');
        $table->decimal('cost', 10, 2);  // For storing cost as a decimal value
        $table->string('location');
        $table->string('Company');
        $table->string('Status');  // Borrowing status
        $table->date('borrowed_date')->nullable();  // Nullable in case it's not borrowed yet
        $table->date('returned_date')->nullable();  // Nullable in case it's not returned yet
        $table->timestamps();  // Adds created_at and updated_at fields
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing_history');
    }
};