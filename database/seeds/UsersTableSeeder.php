<?php

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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bookborrower.com',
            'password' => bcrypt('admin'),
            'api_token' => Str::random(60)
        ]);
    }
}
