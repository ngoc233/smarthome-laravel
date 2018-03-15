<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "ngoc23319952",
            'email' => "ngoc23319952@gmail.com",
            'password' => bcrypt("ngoc23319952"),
            'status'   => 0,
        ]);
    }
}
