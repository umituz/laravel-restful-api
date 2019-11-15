<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'umituz',
            'first_name' => 'Ümit',
            'last_name' => 'UZ',
            'email' => 'umituz998@gmail.com',
            'password' => bcrypt('123456')
        ]);

        factory(User::class,50)->create();
    }
}
