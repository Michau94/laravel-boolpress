<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Arr;

class TablePostsSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $users = User::select('id')->pluck('id')->toArray();




        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->title = $faker->text(25);
            $post->content = $faker->text(200);
            $post->image = $faker->imageUrl();
            $post->slug = Str::slug($post->title, '-');
            $post->user_id = Arr::random($users);


            $post->save();
        };
    }
}
