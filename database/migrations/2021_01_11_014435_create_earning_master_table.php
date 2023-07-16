<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_master', function (Blueprint $table) {
            $table->increments('earning_master_no');
            $table->integer('user_no');
            $table->double('total_service_amount');
            $table->double('total_payable_amount');
            $table->double('sp_earning');
            $table->double('paid_amount');
            $table->double('due_amount');
            $table->integer('is_paid');
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
        Schema::dropIfExists('earning_master');
    }
}
