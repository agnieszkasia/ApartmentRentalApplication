<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->string('street');
            $table->integer('number_of_tenants');
            $table->float('flat_area');
            $table->tinyInteger('elevator')->nullable();
            $table->tinyInteger('garage')->nullable();
            $table->string('rubbish');
            $table->tinyInteger('balcony')->nullable();
            $table->integer('ground_floor_flats');
            $table->integer('number_of_floors');
            $table->tinyInteger('animals')->nullable();
            $table->tinyInteger('family_with_children')->nullable();
            $table->tinyInteger('smoking_person')->nullable();
            $table->string('flat_direction');
            $table->string('brightness_of_flat');
            $table->integer('city_id');
            $table->integer('heating_id');
            $table->integer('floor_id');
            $table->integer('type_of_building_id');
            $table->integer('number_of_rooms_id');
            $table->integer('number_of_lifts');
            $table->integer('parking_place_id');
            $table->string('environment_description');
            $table->integer('rental_history_id')->nullable();
            $table->tinyInteger('sublet_permission')->nullable();
            $table->tinyInteger('visibility')->nullable();
            $table->date('available_from');
            $table->float('rent');
            $table->float('additional_fees')->nullable();
            $table->float('deposit')->nullable();
            $table->float('media_fees')->nullable();
            $table->integer('number_of_parking_place')->nullable();
            $table->string('description')->nullable();
            $table->boolean('blocked');
            $table->boolean('inactive');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
