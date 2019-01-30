<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'value' => '35',
            'key' => 'percentage'
        ]);
        \App\Setting::create([
            'value' => '7.5',
            'key' => 'bus_per_half'
        ]);
    }
}
