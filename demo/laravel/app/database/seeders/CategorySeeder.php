<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categories
        DB::table('categories')->insert([
            'id' => 1, 
            'category' => 'special_price',
            'title' => 'ネット注文特別価格メニュー',
            'image' => 'img_top_special_price.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 2, 
            'category' => 'limited_menu',
            'title' => '期間・季節・数量限定メニュー',
            'image' => 'img_top_termLimited.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 3, 
            'category' => 'tobikiri_menu',
            'title' => 'とびきりハンバーグサンド',
            'image' => 'img_top_tobikiri.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 4, 
            'category' => 'burger_menu',
            'title' => 'ハンバーガー',
            'image' => 'img_top_hamburgers.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 5, 
            'category' => 'rice_burger_menu',
            'title' => 'モスライスバーガー／ホットドッグ',
            'image' => 'img_top_rice-hotdogs.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 6, 
            'category' => 'natsumi',
            'title' => 'モスの菜摘（なつみ）',
            'image' => 'img_top_natsumi.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 7, 
            'category' => 'soypatty',
            'title' => 'ソイパティ',
            'image' => 'img_top_soypatty.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 8, 
            'category' => 'side_menu',
            'title' => 'サイドメニュー',
            'image' => 'img_top_side.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 9, 
            'category' => 'drinks_soup',
            'title' => 'ドリンク/スープ',
            'image' => 'img_top_drinks_soup.jpg',
        ]);
        DB::table('categories')->insert([
            'id' => 10, 
            'category' => 'dessert_menu',
            'title' => 'デザート',
            'image' => 'img_top_dessert.jpg',
        ]);
    }
}
