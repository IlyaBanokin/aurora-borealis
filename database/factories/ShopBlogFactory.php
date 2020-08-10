<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShopBlog;
use Faker\Generator as Faker;

$factory->define(ShopBlog::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000)); // Реальный текст от 1000-4000 символов
    $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
    $img = 'no_image.jpg';

    $data = [
        'title' => $title,
        'alias' => Str::slug($title),
        'content' => $txt,
        'keywords' => $faker->text(rand(40, 160)),
        'description' => $faker->text(rand(40, 160)),
        'img' => $img,
        'published_at' => $faker->dateTimeBetween('-1 month', '-1 days'),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});
