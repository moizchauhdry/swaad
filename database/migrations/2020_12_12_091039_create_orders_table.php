<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('tracking_id')->nullable();
            $table->double('gross_total')->nullable();
            $table->string('order_tip')->nullable();
            $table->double('net_total')->nullable();
            $table->string('coupon_code')->nullable();
            $table->double('coupon_discount_amount')->nullable();
            $table->integer('order_status')->default(0);
            // DELIVERY INFORMATION
            $table->string('delivery_time')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('order_notes')->nullable();
            $table->integer('payment_status')->default(0);
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
