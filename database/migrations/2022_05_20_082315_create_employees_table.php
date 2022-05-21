<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();           
            $table->string('phone')->unique();
            $table->string('address');
            $table->text('photo');      
            $table->string('dob');
            $table->text('skill');    
            $table->unsignedBigInteger('state');  
  $table->foreign('state')
          ->references('id')
          ->on('states')
          ->onDelete('cascade');  
  $table->unsignedBigInteger('city');
  $table->foreign('city')
          ->references('id')
          ->on('cities')
          ->onDelete('cascade');      
  $table->unsignedBigInteger('position_id');  
  $table->foreign('position_id')
          ->references('id')
          ->on('positions')
          ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
