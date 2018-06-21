<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrNew([
            'email' => 'bram.klapwijk00@gmail.com',
            'password' => bcrypt(env('ADMIN_PASS')),
        ]);
    }
}
