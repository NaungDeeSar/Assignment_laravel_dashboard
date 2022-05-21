<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkHistroysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_histroys', function (Blueprint $table) {
            $table->id();
            $table->string('position_name');
            $table->string('company_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->text('note');
            $table->unsignedBigInteger('emp_id');  
            $table->foreign('emp_id')
                    ->references('id')
                    ->on('employees')
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
        Schema::dropIfExists('work_histroys');
    }
}
