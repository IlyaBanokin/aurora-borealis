<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_menus', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('path')->unique();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('img', 40)->default('no_image.jpg');

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
        Schema::dropIfExists('shop_menu');
    }
}
