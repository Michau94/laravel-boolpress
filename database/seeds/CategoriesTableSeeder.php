<?php


use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category_names = ['HTML', 'CSS', 'JS', 'PHP', 'LARAVEL', 'VUE.JS'];

        foreach ($category_names as $name) {

            $category = new Category();

            $category->name = $name;
            $category->slug = Str::slug($category->name, '-');

            $category->save();
        };
    }
}
