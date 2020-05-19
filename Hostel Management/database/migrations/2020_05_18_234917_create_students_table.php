<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no');
            $table->string('name');
            $table->string('father _ame');
            $table->foreignId('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('year');
            $table->foreignId('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->nullable();
            $table->string('mobile');
            $table->date('dob');
            $table->tinyInteger('gender')->comment('0->female 1->male 2->others');
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
        Schema::dropIfExists('students');
    }
}
