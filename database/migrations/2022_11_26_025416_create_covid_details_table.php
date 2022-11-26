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
        Schema::create('COVID_DETAILS_TB', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('update_date_time')->nullable();
            $table->string('local_new_cases',50)->nullable();
            $table->string('local_total_cases',50)->nullable();
            $table->string('local_total_number_of_individuals_in_hospitals',50)->nullable();
            $table->string('local_deaths',50)->nullable();
            $table->string('local_recovered',50)->nullable();
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
        Schema::dropIfExists('COVID_DETAILS_TB');
    }
};
