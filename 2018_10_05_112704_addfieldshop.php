<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addfieldshop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*if(Schema::hasTable('shop')){
            if(Schema::hasColumn('shop', 'status','contract_status','contract_start_date','contract_end_date')){
                Schema::table('shop', function (Blueprint $table) {
                    $table->boolean('status')->after('shop_memo_admin');
                    $table->enum('contract_status',['none', 'sales', 'updated', 'ended'])->after('shop_memo_admin');
                    $table->datetime('contract_start_date')->change();
                    $table->datetime('contract_end_date')->change();
                });
            }
        }*/
        Schema::rename('shop','shops');
        Schema::rename('user','users');
        //rename table name from model_area to model_areas
        Schema::rename('model_area','model_areas');
        //rename table name from model_allergen to model_allergens
        Schema::rename('model_allergen','model_allergens');
        //rename table name from model_menu to model_menus
        Schema::rename('model_menu','model_menus');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('shops');
    }
}