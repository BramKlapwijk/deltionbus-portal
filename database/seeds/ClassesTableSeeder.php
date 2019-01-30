<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Schemes::where('id', 'like', '%%')->delete();
        Classes::where('id', 'like', '%%')->delete();
        $client = new GuzzleHttp\Client();
        $res = $client->Request('GET','https://roosters.deltion.nl/api/group', ['verify' => false]);
        $content = json_decode($res->getBody());
        foreach ($content->data as $class) {
            Classes::create([
                'name' => $class,
                'slug' => strtolower($class)
            ]);
        }
    }
}
