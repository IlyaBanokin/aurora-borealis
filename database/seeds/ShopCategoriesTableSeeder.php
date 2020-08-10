<?php

use Illuminate\Database\Seeder;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        for($i = 1; $i <= 7; $i++){
            $cName = 'Категория #'.$i;
            $excerpt = "Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов";
            $keywords = 'Ключевые слова';
            $description = 'Краткое описание';

            $categories[] = [
                'title' => $cName,
                'alias' => Str::slug($cName),
                'excerpt' => $excerpt,
                'keywords' => $keywords,
                'description' => $description,
            ];
        }

        DB::table('shop_categories')->insert($categories);
    }
}
