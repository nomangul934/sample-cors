<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name',190);
            $table->tinyInteger('listing');
            $table->tinyInteger('enhanced_listing');
            $table->tinyInteger('lead_generation');
            $table->integer('school_fairs');
            $table->integer('school_activities');
            $table->integer('email_marketing');
            $table->integer('marketing_support');
            $table->integer('digital_media_promotion');
            $table->integer('digital_media_promotion_weekly');
            $table->integer('SMS_marketing');
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
        Schema::dropIfExists('packages');
    }
}
