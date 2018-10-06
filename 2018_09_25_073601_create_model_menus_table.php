<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_hash_id');
            $table->string('menu_shop_hash_id');
            $table->string('menu_name');
            $table->string('menu_image')->nullable();
            $table->integer('menu_image_height')->nullable();
            $table->integer('menu_image_width')->nullable();
            $table->integer('menu_price');
            $table->integer('menu_cooking_time');
            $table->integer('menu_add_cooking_time');
            $table->integer('menu_count');
            $table->integer('menu_count_remain');
            $table->string('menu_freshness_expire_at');
            $table->tinyInteger('menu_display_order')->nullable();
            $table->string('menu_description')->nullable();
            $table->tinyInteger('menu_is_sell');
            $table->tinyInteger('menu_type')->nullable();
            $table->tinyInteger('menu_repeat')->nullable();
            $table->tinyInteger('menu_exhibit_type')->default(0)->nullable();
            $table->string('menu_exhibit_week')->nullable();
            $table->dateTime('menu_start_at')->nullable();
            $table->dateTime('menu_end_at')->nullable();
            $table->dateTime('menu_hand_over_start_at');
            $table->dateTime('menu_hand_over_end_at');
            $table->integer('menu_count_each');
            $table->tinyInteger('menu_category');
            $table->timestamps();
        });
        //merge from mr.shii project
        //adding
        Schema::table('model_menus', function(Blueprint $table){
            $table->unsignedInteger('menu_shop_id')->after('id');
            $table->string('menu_allergies')->nullable();
            $table->softDeletes();
        });
        //update
        Schema::table('model_menus', function(Blueprint $table){
            $table->dateTime('menu_hand_over_start_at')->default('CURRENT_TIMESTAMP')->change();
            $table->dateTime('menu_hand_over_end_at')->default('CURRENT_TIMESTAMP')->change();
        });
        //delete
        Schema::table('model_menus', function(Blueprint $table){
            $table->dropColumn(['menu_hash_id','menu_shop_hash_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_menus');
    }
}
