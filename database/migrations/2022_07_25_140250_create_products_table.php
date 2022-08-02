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
            $table->string('product_name');
            $table->text('short_desc');
            $table->text('long_desc');

            $table->string('product_slug')->nullable();
            $table->string('discount_price');
            $table->string('product_qty');
            $table->string('selling_price');
            $table->string('product_thambnail')->nullable();
            $table->string('product_tag');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();

            $table->string('product_code');
            $table->string('category_id');
            $table->string('brand_id');
            $table->integer('latest')->nullable();
            $table->integer('feature')->nullable();
            $table->integer('status')->default(0);
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
