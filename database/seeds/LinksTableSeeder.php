<?php

use Illuminate\Database\Seeder;

// 追加
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $links = [
            [
                'title' => 'YouTube',
                'url' => 'https://www.youtube.com',
                'description' => '好きな動画を見たい時に'
            ],
            [
                'title' => 'Google',
                'url' => 'https://www.google.co.jp',
                'description' => 'なんでも教えてくれる先生'
            ],
            [
                'title' => 'Amazon',
                'url' => 'https://www.amazon.co.jp',
                'description' => 'いつでもどこでもお買い物'
            ]
        ];

        foreach ($links as $link) {
            // DBにデータを追加する
            DB::table('links')->insert([
                'title' => $link['title'],
                'url' => $link['url'],
                'description' => $link['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
