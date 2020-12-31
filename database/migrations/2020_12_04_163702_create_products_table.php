<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('title_gr')->nullable();
            $table->string('image_url')->nullable();
            $table->double('price')->nullable();
            $table->text('description')->nullable();
            $table->text('description_gr')->nullable();
            $table->boolean('status')->default(TRUE);
            $table->integer('view_count')->default(0);
            $table->integer('spice_level')->default(0);
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
        Schema::dropIfExists('products');
    }
}
