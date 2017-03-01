<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressesTableAddASellerForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function($table) {
            $table->integer('seller_id')->unsigned();

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function($table) {
            $table->dropForeign(['seller_id']);
            $table->dropColumn('seller_id');
        });
    }
}
