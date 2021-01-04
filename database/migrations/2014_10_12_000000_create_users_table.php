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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_no', 20);
            $table->string('home_no', 20);
            $table->string('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(true);
            $table->string('device_token')->nullable();
            $table->string('access_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('shp_address')->nullable();
            $table->string('shp_phone_no')->nullable();

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
