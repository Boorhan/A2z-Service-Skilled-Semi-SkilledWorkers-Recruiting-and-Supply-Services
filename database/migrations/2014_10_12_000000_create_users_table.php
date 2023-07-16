<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_no');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->integer('user_type')->nullable();
            $table->string('user_nid')->unique()->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('user_details')->nullable();
            $table->integer('id_type_no')->nullable();
            $table->string('additional_id_num')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_photo')->nullable();
            $table->string('user_nid_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_approved')->default(1);
            $table->integer('is_active')->default(1);
            $table->integer('created_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
