<?php

namespace Database\Seeders;

use App\Models\Noticeboard;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NoticeboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $notices = [
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'url',
                'url' => 'https://www.facebook.com/',
            ],
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'url',
                'url' => 'https://www.facebook.com/',
            ],
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'url',
                'url' => 'https://www.facebook.com/',
            ],  
        ];
        
        foreach($notices as $key => $notice)
        {
            $photo_id = $key+1;
            $notice = Noticeboard::create($notice);
        }

        $notices = [
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'attachment',
            ],
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'attachment',
            ],
            [
                'title' => $faker->sentence,
                'body'       => $faker->paragraph,
                'link_to' => 'attachment',
            ],  
        ];
        foreach($notices as $key => $notice)
        {
            $photo_id = $key+1;
            $notice = Noticeboard::create($notice);
            $notice->addMedia(storage_path()."/seeders/posts/$photo_id.jpg")->preservingOriginal()->toMediaCollection('attachment');
        }
    }
}
