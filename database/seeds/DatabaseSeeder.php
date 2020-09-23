<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'images' => 'null',
            'first_name'   => 'null',
            'last_name'    => 'null',
            'company_name' => 'null',
            'phone_number' => '0965356723',
            'website'      => 'null',
            'role'  => 1
        ]);
    }
}
