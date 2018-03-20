<?php

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new News)->truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            (new News)->save([
                'title' => $faker->sentence,
                'description' => implode(',',$faker->paragraphs($nb = 8, $asText = false)),
                'image_name' => 'nofoto.jpg',
            ]);
        }}
}
