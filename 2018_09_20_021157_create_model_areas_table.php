<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_name');
            $table->string('area_group');
            $table->timestamps();
        });
        //add from me
        Schema::table('model_areas', function (Blueprint $table) {
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_areas');
    }
}
