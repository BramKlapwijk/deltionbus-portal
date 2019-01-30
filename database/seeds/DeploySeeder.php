<?php

use Illuminate\Database\Seeder;

class DeploySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClassesTableSeeder::class);
        $this->call(SchemesTableSeeder::class);
    }
}
