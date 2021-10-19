<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class TablePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->title = $faker->text(25);
            $post->content = $faker->text(200);
            $post->image = $faker->imageUrl();
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        };
    }
}
