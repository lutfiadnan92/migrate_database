<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAllergensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_allergen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('allergy_name');
            $table->string('allergy_image');
            $table->string('allergy_description');
            $table->tinyInteger('allergy_category');
            $table->timestamps();
        });
        //add column deleted_at
        Schema::table('model_allergen', function(Blueprint $table){
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
        Schema::dropIfExists('model_allergen');
    }
}
