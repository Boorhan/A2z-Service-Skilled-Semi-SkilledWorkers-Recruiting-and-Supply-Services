<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('service_no');
            $table->integer('category_no');
            $table->integer('subcategory_no');
            $table->string('service_name');
            $table->string('service_slug');
            $table->double('service_charge');
            $table->integer('service_type_no');
            $table->text('payment_details');
            $table->text('what_included');
            $table->text('what_excluded');
            $table->text('terms_condition');
            $table->text('service_details');
            $table->string('service_image');
            $table->integer('is_approved')->default(0);
            $table->integer('created_by');
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('services');
    }
}
