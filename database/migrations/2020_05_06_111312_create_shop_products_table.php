<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title',255);
            $table->string('alias')->unique();

            $table->bigInteger('category_id')->unsigned();

            $table->string('excerpt',180);
            $table->text('content');

            $table->string('price',6)->default('0');
            $table->string('old_price',6)->default(0)->nullable();

            $table->string('keywords',160)->nullable();
            $table->string('description',180)->nullable();

            $table->string('img')->default('no_image.jpg');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('shop_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
}
