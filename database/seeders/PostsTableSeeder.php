<?php

namespace Database\Seeders;

use App\Models\ContentCategory;
use App\Models\ContentPage;
use App\Models\ContentTag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        
        $faker = Factory::create();

        for ($i=0; $i < 20; $i++) { 
            $name = $faker->name;
            ContentCategory::create([
                'name' => $name,
                'slug' => Str::slug($name, '_'),
            ]);
        }
      
        for ($i=0; $i < 20; $i++) { 
            $name = $faker->name;
            ContentTag::create([
                'name' => $name,
                'slug' => Str::slug($name, '_'),
            ]);
        }

        $categories = ContentCategory::all()->random(4)->modelKeys();
        $tags = ContentTag::all()->modelKeys();

        $contentPages = [
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
           
            [
                'title'       => $faker->sentence,
                'excerpt'     => $faker->sentence,
                'page_text' => $faker->paragraph
            ],
          
        ];
        foreach($contentPages as $key => $contentPage)
        {
            $photo_id = $key+1;
            $contentPage = ContentPage::create($contentPage);
            $contentPage->categories()->sync(ContentCategory::all()->random(4)->modelKeys());
            $contentPage->tags()->sync(ContentTag::all()->random(4)->modelKeys());    
            $contentPage->addMedia(storage_path()."/seeders/posts/$photo_id.jpg")->preservingOriginal()->toMediaCollection('featured_image');
        }
    }
}
