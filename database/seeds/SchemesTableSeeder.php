<?php

use Illuminate\Database\Seeder;

class SchemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = \Carbon\Carbon::now()->startOfWeek()->format('Ymd');
        $end = \Carbon\Carbon::now()->endOfWeek()->format('Ymd');
        $client = new GuzzleHttp\Client();
        foreach (\App\Classes::all() as $class) {
            $res = $client->Request('GET', 'https://roosters.deltion.nl/api/roster?group='.$class->name.'&start=' . $start . '&end=' . $end, ['verify' => false]);
            $data = json_decode($res->getBody())->data;
            foreach ($data as $day) {
                if (!empty($day->items)) {
                    \App\Schemes::create([
                        'class_id' => $class->id,
                        'date' => \Carbon\Carbon::parse($day->date),
                        'start' => substr($day->items[0]->t, 0, 5),
                        'end' => substr(end($day->items)->t, 8, 5)
                    ]);
                }
            }
        }
    }
}
