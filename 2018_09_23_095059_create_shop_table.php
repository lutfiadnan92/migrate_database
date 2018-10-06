<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_hash_id');
            $table->string('shop_name');
            $table->string('shop_status');
            $table->string('shop_email');
            $table->string('shop_password');
            $table->string('shop_image');
            $table->string('shop_staff_name');
            $table->string('shop_staff_tel'); //Contact person telephone number (required)
            $table->string('shop_display_tel'); //Phone number for display
            $table->string('shop_display_email');
            $table->string('shop_address');
            $table->string('shop_geo'); //longitude lotitude
            $table->string('shop_bank_account_name');
            $table->string('shop_bank_account_code');
            $table->tinyInteger('shop_bank_account_type');
            $table->string('shop_bank_account_number');
            $table->string('shop_bank_account_holder_name'); //Bank account branch name
            $table->string('shop_founded_at'); //for field founding date in form
            $table->string('shop_owner_name');  //Representative's name
            $table->string('shop_count_worker'); //Number of employees (people)
            $table->string('shop_hp_url'); //HP URL
            $table->string('shop_open_day'); //Opening date
            $table->string('shop_description'); //Description
            $table->string('shop_memo'); //Notes (for stores)
            $table->string('shop_memo_admin'); //Notes (for management)
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->string('contract_renewal_status');
            $table->string('ipad_number');
            $table->string('printer_number');
            $table->string('shop_open_at');
            $table->string('shop_close_at');
            $table->string('shop_stripe_id');
            $table->decimal('shop_stripe_commission');
            $table->string('mail_to_management'); //Management side mail body
            $table->string('mail_to_customer'); //Customer side mail body
            $table->string('company_name');
            $table->string('company_owner_name');
            $table->string('company_address');
            $table->string('last_exhibit_at');
            $table->timestamps();
        });

        //add 4 column and change 2 column that is contract_start_date
        Schema::table('shop', function (Blueprint $table) {
            $table->boolean('status')->after('shop_memo_admin');
            $table->enum('contract_status',['none', 'sales', 'updated', 'ended'])->after('shop_memo_admin');
            $table->datetime('contract_start_date')->after('shop_memo_admin')->change();
            $table->datetime('contract_end_date')->after('shop_memo_admin')->change();
            $table->string('areas');
            $table->softDeletes();             
        });
        //delete shop_hash_id
        Schema::table('shop', function (Blueprint $table) {
            $table->dropColumn(['shop_hash_id','ipad_number','printer_number','mail_to_management','mail_to_customer']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }
}
