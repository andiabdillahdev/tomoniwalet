<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'role' => 2,
            'password' => Hash::make('password'),
        ]);
    }
}
