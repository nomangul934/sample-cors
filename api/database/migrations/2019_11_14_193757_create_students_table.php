<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('school_id');
            $table->string('name')->nullable();
            $table->integer('nationality_id')->default(0);
            $table->integer('gender_id');
            $table->integer('email');
            $table->integer('mobile');
            $table->integer('grade_id');
            $table->integer('sm_1_id')->default(0);
            $table->integer('sm_2_id')->default(0);
            $table->integer('specializations_1_id')->default(0);
            $table->integer('specializations_2_id')->default(0);
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
