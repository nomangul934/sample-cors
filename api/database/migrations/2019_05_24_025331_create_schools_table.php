<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('address1')->nullable(true);
            $table->string('address2')->nullable(true);
            $table->string('country')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->text('about_us')->nullable(true);
            $table->text('full_profile')->nullable(true);
            $table->string('logo')->nullable(true);
            $table->integer('number_grade11')->default(0);
            $table->integer('number_grade12')->default(0);
            $table->unsignedInteger('fees_grade11')->nullable(true);
            $table->unsignedInteger('fees_grade12')->nullable(true);
            $table->integer('state')->default(1);
            $table->string('users')->nullable(true);
            $table->string('emails')->nullable(true);
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('curriculum_id')->index()->nullable(true);
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
        Schema::dropIfExists('schools');
    }
}
