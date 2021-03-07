<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\TeamMemeber;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $members = [
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
            [
                'name'       => $faker->name,
                'position'   => $faker->word,
                'twitter_link'   => "https://twitter.com/",
                'facebook_link'   => "https://facebook.com/",
                'instagram_link'   => "https://www.instagram.com/",
                'linkedin_link'   => "https://pk.linkedin.com/",
            ],
        ];
        foreach($members as $key => $member)
        {
            $photo_id = $key+1;
            $member = TeamMemeber::create($member);
            $member->addMedia(storage_path()."/seeders/speakers/$photo_id.jpg")->preservingOriginal()->toMediaCollection('image');
        }
    }
}
