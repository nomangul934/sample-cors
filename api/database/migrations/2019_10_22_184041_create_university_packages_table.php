<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_id');
            $table->integer('school_fairs')->default(0);
            $table->integer('school_activities')->default(0);
            $table->integer('email_marketing')->default(0);
            $table->integer('marketing_support')->default(0);
            $table->integer('digital_media_promotion')->default(0);
            $table->integer('digital_media_promotion_weekly')->default(0);
            $table->integer('SMS_marketing')->default(0);
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
        Schema::dropIfExists('university_packages');
    }
}
