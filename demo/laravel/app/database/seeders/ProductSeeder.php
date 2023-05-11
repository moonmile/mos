<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'title' => '【特別価格】モス野菜バーガー',
            'price' => 360,
            'image' => 'W0000011402-00_1_M.jpeg',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'title' => '【特別価格】ダブルチーズバーガー',
            'price' => 360,
            'image' => 'W0000010455-00_1_M.jpeg',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'title' => '【特別価格】オニオンフライ',
            'price' => 250,
            'image' => 'W0000211296-00_1_M.jpeg',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'title' => '【特別価格】炭酸ドリンクSサイズ',
            'price' => 100,
            'image' => 'W0000483070-00_1_M.jpeg',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'title' => '【期間限定】クリームチーズテリヤキバーガー',
            'price' => 410,
            'image' => 'W0000010121-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'title' => '【期間限定】クリームチーズダブルテリヤキバーガー',
            'price' => 540,
            'image' => 'W0000010122-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'title' => '【期間限定】まぜるシェイク いちご',
            'price' => 310,
            'image' => 'WSD00494157-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'title' => '【数量限定】まぜるドリンク アイス塩キャラメルラテ＜クリスマス島の塩（R）使用＞',
            'price' => 380,
            'image' => 'W0000463027-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'title' => '【期間限定】ひんやりドルチェ カップ 木いちご',
            'price' => 320,
            'image' => 'W0000685732-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'title' => '【期間限定】ひんやりドルチェ ピスタチオ＆ラズベリー',
            'price' => 190,
            'image' => 'W0000685714-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'title' => '【期間限定】ひんやりドルチェ5個入りBOX ピスタチオ＆ラズベリー',
            'price' => 950,
            'image' => 'W0000685715-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'title' => '【期間限定】＜冷凍＞バターなんていらないかも、と思わず声に出したくなるほど濃厚な食パンで作ったフレ ンチトースト',
            'price' => 250,
            'image' => 'W0000120124-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'title' => '【期間限定】メープル風シロップ',
            'price' => 40,
            'image' => 'W0000012407-00_1_M.jpeg',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'title' => 'とびきりチーズ?北海道産ゴーダチーズ使用?',
            'price' => 470,
            'image' => 'W0000011470-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 15,
            'title' => 'ダブルとびきりチーズ?北海道産ゴーダチーズ使用?',
            'price' => 700,
            'image' => 'W0000011535-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'title' => 'とびきり和風ソース',
            'price' => 440,
            'image' => 'W0000011504-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'title' => 'ダブルとびきり和風ソース',
            'price' => 670,
            'image' => 'W0000011536-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 18,
            'title' => 'とびきりトマト＆レタス',
            'price' => 490,
            'image' => 'W0000011420-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 19,
            'title' => 'ダブルとびきりトマト＆レタス',
            'price' => 720,
            'image' => 'W0000011537-00_1_M.jpeg',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 20,
            'title' => '【特別価格】モス野菜バーガー',
            'price' => 360,
            'image' => 'W0000011402-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 21,
            'title' => '【特別価格】ダブルチーズバーガー',
            'price' => 360,
            'image' => 'W0000010455-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 22,
            'title' => '【期間限定】クリームチーズテリヤキバーガー',
            'price' => 410,
            'image' => 'W0000010121-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 23,
            'title' => '【期間限定】クリームチーズダブルテリヤキバーガー',
            'price' => 540,
            'image' => 'W0000010122-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 24,
            'title' => 'テリヤキバーガー',
            'price' => 380,
            'image' => 'W0000010330-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 25,
            'title' => 'ダブルテリヤキバーガー',
            'price' => 510,
            'image' => 'W0000010334-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 26,
            'title' => 'グリーンバーガー＜テリヤキ＞ GREEN BURGER TERIYAKI',
            'price' => 580,
            'image' => 'W0000011358-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 27,
            'title' => 'モスバーガー',
            'price' => 390,
            'image' => 'W0000010320-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 28,
            'title' => 'モスチーズバーガー',
            'price' => 420,
            'image' => 'W0000010340-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 29,
            'title' => 'テリヤキチキンバーガー',
            'price' => 380,
            'image' => 'W0000010007-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 30,
            'title' => 'フィッシュバーガー',
            'price' => 360,
            'image' => 'W0000010005-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 31,
            'title' => 'ロースカツバーガー',
            'price' => 400,
            'image' => 'W0000010011-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 32,
            'title' => '海老カツバーガー',
            'price' => 410,
            'image' => 'W0000010840-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 33,
            'title' => 'チキンバーガー',
            'price' => 290,
            'image' => 'W0000010004-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 34,
            'title' => 'ハンバーガー',
            'price' => 220,
            'image' => 'W0000010036-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 35,
            'title' => 'チーズバーガー',
            'price' => 250,
            'image' => 'W0000010037-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 36,
            'title' => 'ダブルモスバーガー',
            'price' => 520,
            'image' => 'W0000010322-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 37,
            'title' => 'ダブルモスチーズバーガー',
            'price' => 550,
            'image' => 'W0000010341-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 38,
            'title' => 'ダブルモス野菜バーガー',
            'price' => 510,
            'image' => 'W0000011466-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 39,
            'title' => 'ダブルハンバーガー',
            'price' => 350,
            'image' => 'W0000010082-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 40,
            'title' => 'スパイシーモスバーガー',
            'price' => 420,
            'image' => 'W0000010350-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 41,
            'title' => 'スパイシーモスチーズバーガー',
            'price' => 450,
            'image' => 'W0000010360-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 42,
            'title' => 'スパイシーダブルモスバーガー',
            'price' => 550,
            'image' => 'W0000010351-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 43,
            'title' => 'スパイシーダブルモスチーズバーガー',
            'price' => 580,
            'image' => 'W0000010361-00_1_M.jpeg',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'id' => 44,
            'title' => 'モスライスバーガー海鮮かきあげ（塩だれ）',
            'price' => 370,
            'image' => 'W0000020130-00_1_M.jpeg',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 45,
            'title' => 'モスライスバーガー焼肉',
            'price' => 420,
            'image' => 'W0000020310-00_1_M.jpeg',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 46,
            'title' => 'ホットドッグ',
            'price' => 340,
            'image' => 'W0000110001-00_1_M.jpeg',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 47,
            'title' => 'チリドッグ',
            'price' => 370,
            'image' => 'W0000110002-00_1_M.jpeg',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 48,
            'title' => 'スパイシーチリドッグ',
            'price' => 400,
            'image' => 'W0000110021-00_1_M.jpeg',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 49,
            'title' => 'モスの菜摘（なつみ）モス野菜',
            'price' => 380,
            'image' => 'W0000010718-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 50,
            'title' => 'モスの菜摘（なつみ）テリヤキチキン',
            'price' => 380,
            'image' => 'W0000010728-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 51,
            'title' => 'モスの菜摘（なつみ）フィッシュ',
            'price' => 360,
            'image' => 'W0000010720-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 52,
            'title' => 'モスの菜摘（なつみ）ロースカツ',
            'price' => 400,
            'image' => 'W0000010721-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 53,
            'title' => 'モスの菜摘（なつみ）海老カツ',
            'price' => 410,
            'image' => 'W0000010722-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 54,
            'title' => 'モスの菜摘（なつみ）チキン',
            'price' => 290,
            'image' => 'W0000010719-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 55,
            'title' => 'モスの菜摘（なつみ）ソイモス野菜',
            'price' => 380,
            'image' => 'W0000010732-00_1_M.jpeg',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'id' => 56,
            'title' => 'ソイモスバーガー',
            'price' => 390,
            'image' => 'W0000011111-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 57,
            'title' => 'ソイテリヤキバーガー',
            'price' => 380,
            'image' => 'W0000011115-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 58,
            'title' => 'ソイモス野菜バーガー',
            'price' => 380,
            'image' => 'W0000010390-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 59,
            'title' => 'ソイモスチーズバーガー',
            'price' => 420,
            'image' => 'W0000011113-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 60,
            'title' => 'ソイハンバーガー',
            'price' => 220,
            'image' => 'W0000011116-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 61,
            'title' => 'ソイチーズバーガー',
            'price' => 250,
            'image' => 'W0000011117-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 62,
            'title' => 'ソイスパイシーモスバーガー',
            'price' => 420,
            'image' => 'W0000011112-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 63,
            'title' => 'ソイスパイシーモスチーズバーガー',
            'price' => 450,
            'image' => 'W0000011114-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 64,
            'title' => 'モスの菜摘（なつみ）ソイモス野菜',
            'price' => 380,
            'image' => 'W0000010732-00_1_M.jpeg',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 65,
            'title' => '【特別価格】オニオンフライ',
            'price' => 250,
            'image' => 'W0000211296-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 66,
            'title' => 'フレンチフライポテト',
            'price' => 230,
            'image' => 'WSD00210001-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 67,
            'title' => 'チリディップソース',
            'price' => 90,
            'image' => 'W0000211520-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 68,
            'title' => 'オニポテ(フレンチフライポテト&オニオンフライ)',
            'price' => 260,
            'image' => 'W0000211130-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 69,
            'title' => 'スマートパイ＜チョコ＞',
            'price' => 210,
            'image' => 'W0000210083-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 70,
            'title' => 'モスチキン',
            'price' => 270,
            'image' => 'W0000220001-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 71,
            'title' => 'バラエティパックA',
            'price' => 1040,
            'image' => 'W0000211940-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 72,
            'title' => 'バラエティパックB',
            'price' => 1490,
            'image' => 'W0000211941-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 73,
            'title' => 'バラエティパックC',
            'price' => 1310,
            'image' => 'W0000211945-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 74,
            'title' => 'モスチキンパック（5本入り）',
            'price' => 1350,
            'image' => 'W0000220006-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 75,
            'title' => 'モスチキンパック（10本入り）',
            'price' => 2700,
            'image' => 'W0000220007-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 76,
            'title' => 'チキンナゲット（5コ入り）※ソース別売',
            'price' => 330,
            'image' => 'W0000210007-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 77,
            'title' => 'バーベキューソース',
            'price' => 40,
            'image' => 'W0000210043-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 78,
            'title' => 'マスタードソース',
            'price' => 40,
            'image' => 'W0000210044-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 79,
            'title' => 'こだわりサラダ ローストアマニトッピング 和風ドレッシング＜減塩タイプ＞',
            'price' => 290,
            'image' => 'W0000211161-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 80,
            'title' => '和風ドレッシング＜減塩タイプ＞',
            'price' => 30,
            'image' => 'W0000920000-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 81,
            'title' => '冷凍モスチキン（5本入り）',
            'price' => 1350,
            'image' => 'W0000221020-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 82,
            'title' => '【期間限定】＜冷凍＞バターなんていらないかも、と思わず声に出したくなるほど濃厚な食パンで作ったフレ ンチトースト',
            'price' => 250,
            'image' => 'W0000120124-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 83,
            'title' => '【期間限定】メープル風シロップ',
            'price' => 40,
            'image' => 'W0000012407-00_1_M.jpeg',
            'category_id' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 84,
            'title' => '【特別価格】炭酸ドリンクSサイズ',
            'price' => 100,
            'image' => 'W0000483070-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 85,
            'title' => '【期間限定】まぜるシェイク いちご',
            'price' => 310,
            'image' => 'WSD00494157-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 86,
            'title' => '【数量限定】まぜるドリンク アイス塩キャラメルラテ＜クリスマス島の塩（R）使用＞',
            'price' => 380,
            'image' => 'W0000463027-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 87,
            'title' => 'アイスコーヒー',
            'price' => 230,
            'image' => 'WSD00463091-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 88,
            'title' => 'アイスティー キャンディ茶葉（レモン）',
            'price' => 230,
            'image' => 'WSD00473071-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 89,
            'title' => 'アイスティー キャンディ茶葉（ミルク）',
            'price' => 230,
            'image' => 'WSD00473071-01_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 90,
            'title' => 'アイスティー キャンディ茶葉（ストレート）',
            'price' => 230,
            'image' => 'WSD00473071-02_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 91,
            'title' => '100％オレンジジュース',
            'price' => 230,
            'image' => 'WSD00480026-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 92,
            'title' => 'ペプシコーラM',
            'price' => 250,
            'image' => 'W0000480002-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 93,
            'title' => 'ペプシコーラL',
            'price' => 320,
            'image' => 'W0000480003-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 94,
            'title' => 'ジンジャーエールＭ',
            'price' => 250,
            'image' => 'W0000480017-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 95,
            'title' => 'ジンジャーエールＬ',
            'price' => 320,
            'image' => 'W0000480018-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 96,
            'title' => 'メロンソーダ（無果汁）M',
            'price' => 250,
            'image' => 'W0000480008-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 97,
            'title' => 'メロンソーダ（無果汁）L',
            'price' => 320,
            'image' => 'W0000480009-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 98,
            'title' => 'アイスウーロン茶',
            'price' => 190,
            'image' => 'WSD00470066-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 99,
            'title' => 'アイスカフェラテ',
            'price' => 300,
            'image' => 'WSD00460050-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 100,
            'title' => 'モスシェイク バニラ',
            'price' => 260,
            'image' => 'WSD00490001-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 101,
            'title' => 'モスシェイク コーヒー',
            'price' => 260,
            'image' => 'WSD00490007-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 102,
            'title' => 'まぜるシェイク ほろにが抹茶',
            'price' => 310,
            'image' => 'WSD00494182-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 103,
            'title' => 'くだものと野菜（125ml紙パック）',
            'price' => 90,
            'image' => 'W0000483190-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 104,
            'title' => 'ブレンドコーヒー',
            'price' => 250,
            'image' => 'W0000310008-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 105,
            'title' => '紅茶 キャンディ茶葉（レモン）',
            'price' => 250,
            'image' => 'W0000310021-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 106,
            'title' => '紅茶 キャンディ茶葉（ミルク）',
            'price' => 250,
            'image' => 'W0000310021-01_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 107,
            'title' => '紅茶 キャンディ茶葉（ストレート）',
            'price' => 250,
            'image' => 'W0000310021-02_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 108,
            'title' => 'コーンスープ 北海道産コーン使用',
            'price' => 320,
            'image' => 'W0000312420-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 109,
            'title' => 'クラムチャウダー',
            'price' => 320,
            'image' => 'W0000312435-00_1_M.jpeg',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'id' => 110,
            'title' => '【期間限定】ひんやりドルチェ カップ 木いちご',
            'price' => 320,
            'image' => 'W0000685732-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 111,
            'title' => '【期間限定】ひんやりドルチェ ピスタチオ＆ラズベリー',
            'price' => 190,
            'image' => 'W0000685714-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 112,
            'title' => 'ひんやりドルチェ ベイクドチーズ',
            'price' => 190,
            'image' => 'W0000685693-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 113,
            'title' => '【期間限定】ひんやりドルチェ5個入りBOX ピスタチオ＆ラズベリー',
            'price' => 950,
            'image' => 'W0000685715-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 114,
            'title' => 'ひんやりドルチェ5個入りBOX ベイクドチーズ',
            'price' => 950,
            'image' => 'W0000685694-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 115,
            'title' => 'ひんやりドルチェ Mドリンクセット',
            'price' => 410,
            'image' => 'W0000140156-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 116,
            'title' => 'ひんやりドルチェ Lドリンクセット',
            'price' => 480,
            'image' => 'W0000140157-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 117,
            'title' => 'ひんやりドルチェ ラテセット',
            'price' => 450,
            'image' => 'W0000141384-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 118,
            'title' => 'ひんやりドルチェ スープセット',
            'price' => 450,
            'image' => 'W0000140158-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 119,
            'title' => 'ひんやりドルチェ シェイクMセット',
            'price' => 450,
            'image' => 'W0000140159-00_1_M.jpeg',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'id' => 120,
            'title' => 'ひんやりドルチェ まぜるシェイク／まぜるドリンクセット',
            'price' => 510,
            'image' => 'W0000141274-00_1_M.jpeg',
            'category_id' => 10,
        ]);
    }
}
