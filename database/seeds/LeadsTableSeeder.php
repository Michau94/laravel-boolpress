<?php

use Illuminate\Database\Seeder;
use App\Lead;
use Faker\Generator as Faker;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new Lead();
        $newUser->name = $faker->userName();
        $newUser->email = $faker->email();
        $newUser->message = $faker->text(200);
        $newUser->save();
    }
}
