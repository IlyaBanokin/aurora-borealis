<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title',255);
            $table->string('alias')->unique();

            $table->text('content');

            $table->string('keywords',160)->nullable();
            $table->string('description',180)->nullable();

            $table->string('img')->default('no_image.jpg');

            $table->timestamp('published_at');
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
        Schema::dropIfExists('shop_blog');
    }
}
