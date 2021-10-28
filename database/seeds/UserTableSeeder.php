<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $password = bcrypt('michau94');
        $newUser = new User();
        $newUser->name = 'Michau';
        $newUser->password = bcrypt('michau94');
        $newUser->email = 'michau@michau.com';

        $newUser->save();

        // assegnamo lo stato di admin all primo utente (a me stesso)
        $newUser->roles()->attach(1);

        for ($i = 0; $i < 9; $i++) {
            $newUser = new User();
            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = $password;
            $newUser->save();
        }
    }
}
