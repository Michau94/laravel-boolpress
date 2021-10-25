<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = ['FrontEnd', 'Backend', 'UX/UI', 'Design', 'FullStack'];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->color = $faker->hexColor();
            $newTag->save();
        }
    }
}
