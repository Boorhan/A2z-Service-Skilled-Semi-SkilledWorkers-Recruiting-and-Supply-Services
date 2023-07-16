<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_details', function (Blueprint $table) {
            $table->increments('earning_dlt_no');
            $table->integer('earning_master_no');
            $table->integer('user_no');
            $table->integer('service_no');
            $table->integer('service_request_no');
            $table->double('service_amt');
            $table->double('percent_amt');
            $table->double('sp_earned_amt');
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
        Schema::dropIfExists('earning_details');
    }
}
