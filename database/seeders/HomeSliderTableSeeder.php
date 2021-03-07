<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeSlider::create([
            'title' => 'Welcome to <span>IPS</span>',
            'body_text' => 'The Institute of Professional Studies (IPS) Peshawar is
            established in an area whose inhabitants are
            known for their welcoming and friendly behavior.',
            'button_link' => '#about',
            'button_name' => 'Read More',
        ]);

        HomeSlider::create([
            'title' => 'OUR MISSION',
            'body_text' => 'The IPS through the pursuit of excellence in an ethical
            and congenial environment is committed to providing to a diverse student.',
            'button_link' => '#about',
            'button_name' => 'Read More',
        ]);
        HomeSlider::create([
            'title' => 'OUR VISION',
            'body_text' => 'Our vision is to be a radical and enterprising academic
            institution that serves as an intellectual resource base in the region by providing education of the
            highest international standards based in research and training in order.',
            'button_link' => '#about',
            'button_name' => 'Read More',
        ]);
    }
}
