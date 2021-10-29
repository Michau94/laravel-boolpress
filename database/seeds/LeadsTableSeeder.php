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
        $lead = new Lead();
        $lead->name = $faker->userName();
        $lead->email = $faker->email();
        $lead->message = $faker->text(200);
        $lead->save();
    }
}
