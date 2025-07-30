<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'user_id' => '1',
            'image_url' => 'clock.png',
            'name' => '腕時計',
            'brand_name' => 'Rolax',
            'condition' => '1',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => '15000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'hdd.png',
            'name' => 'HDD',
            'brand_name' => '西芝',
            'condition' => '2',
            'description' => '高速で信頼性の高いハードディスク',
            'price' => '5000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'onion.png',
            'name' => '玉ねぎ3束',
            'brand_name' => 'なし',
            'condition' => '3',
            'description' => '新鮮な玉ねぎ3束のセット',
            'price' => '300',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'shoes.png',
            'name' => '革靴',
            'brand_name' => '',
            'condition' => '4',
            'description' => 'クラシックなデザインの革靴',
            'price' => '4000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'pc.png',
            'name' => 'ノートPC',
            'brand_name' => '',
            'condition' => '1',
            'description' => '高性能なノートパソコン',
            'price' => '45000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'mic.png',
            'name' => 'マイク',
            'brand_name' => 'なし',
            'condition' => '2',
            'description' => '高音質のレコーディング用マイク',
            'price' => '8000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'bag.png',
            'name' => 'ショルダーバッグ',
            'brand_name' => '',
            'condition' => '3',
            'description' => 'おしゃれなショルダーバッグ',
            'price' => '3500',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'tumbler.png',
            'name' => 'タンブラー',
            'brand_name' => 'なし',
            'condition' => '4',
            'description' => '使いやすいタンブラー',
            'price' => '500',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'coffee.png',
            'name' => 'コーヒーミル',
            'brand_name' => 'Starbacks',
            'condition' => '1',
            'description' => '手動のコーヒーミル',
            'price' => '4000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '1',
            'image_url' => 'make.png',
            'name' => 'メイクセット',
            'brand_name' => '',
            'condition' => '2',
            'description' => '便利なメイクアップセット',
            'price' => '2500',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('items')->insert($param);
    }
}
