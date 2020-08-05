<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('map_link')->nullable();
            $table->text('compus')->nullable();
            $table->text('city')->nullable();
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->integer('accredited')->default(0);
            $table->integer('package_id');
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
        Schema::dropIfExists('universities');
    }
}
