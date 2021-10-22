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

        $categories = [
            [
                'name' => 'HTML',
                'color' => 'primary'
            ],
            [
                'name' => 'CSS',
                'color' => 'primary'
            ],
            [
                'name' => 'JS',
                'color' => 'warning'
            ],
            [
                'name' => 'PHP',
                'color' => 'secondary'
            ],
            [
                'name' => 'LARAVEL',
                'color' => 'danger'
            ],
            [
                'name' => 'VUE.JS',
                'color' => 'success'
            ]
        ];

        foreach ($categories as $cat) {

            $category = new Category();

            $category->name = $cat['name'];
            $category->color = $cat['color'];
            $category->slug = Str::slug($category->name, '-');

            $category->save();
        };
    }
}
