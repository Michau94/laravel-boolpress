<?php

use Illuminate\Database\Seeder;
use App\Role;
use Faker\Generator as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $roles = ['admin', 'reviewer', 'editor', 'manager'];

        foreach ($roles as $role) {
            $new_role = new Role();
            $new_role->name = $role;
            $new_role->color = $faker->hexColor();
            $new_role->save();
        }
    }
}
