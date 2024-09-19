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
    Schema::create('borrowing', function (Blueprint $table) {
        $table->id('borrow_id');  // Primary key
        $table->unsignedBigInteger('user_id')->nullable();  // Foreign key reference to users table
        $table->unsignedBigInteger('equipment_id');  // Foreign key reference to equipments table
        $table->string('serial_no');
        $table->string('equipment_name');
        $table->string('building_no');  
        $table->string('room_no');
        $table->string('status'); // Borrowing status
        $table->string('status_borrow')->nullable();
        $table->date('borrowed_date')->nullable();  
        $table->date('returned_date')->nullable();  
        $table->timestamps();  // Adds created_at and updated_at fields
    
        // Define foreign keys
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
    });
    
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing');
    }
};