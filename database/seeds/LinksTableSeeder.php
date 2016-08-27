<?php

use Illuminate\Database\Seeder;

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
        $data = [
            [
                'link_name' => '闲话葡萄酒',
                'link_title' => '说葡萄酒的',
                'link_url' => 'https;//www.zhihu.com',
                'link_order' => 1,
            ],
            [
                'link_name' => '里约奥运',
                'link_title' => '奥运会',
                'link_url' => 'https;//www.zhihu.com',
                'link_order' => 2,
            ],
            [
                'link_name' => '看球欧洲杯',
                'link_title' => '踢足球',
                'link_url' => 'https;//www.zhihu.com',
                'link_order' => 3,
            ]
        ];


        DB::table('links')->insert($data);
    }
}
