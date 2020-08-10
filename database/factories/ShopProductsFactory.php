<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShopProduct;
use Faker\Generator as Faker;

$factory->define(ShopProduct::class, function (Faker $faker) {
    $title = $faker->sentence(rand(2, 6), true);
    $txt = $faker->realText(rand(1000, 4000)); // Реальный текст от 1000-4000 символов
    $price = rand(200, 1020);
    $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
    $img = 'no_image.jpg';

    $data = [
        'category_id' => rand(1, 7),
        'title' => $title,
        'alias' => Str::slug($title),
        'excerpt' => $faker->text(rand(40, 160)), // выдержка
        'content' => $txt,
        'price' => $price,
        'old_price' => $price,
        'keywords' => $faker->text(rand(40, 160)),
        'description' => $faker->text(rand(40, 160)),
        'img' => $img,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});
