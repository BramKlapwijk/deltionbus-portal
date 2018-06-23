<?php

namespace App\Http\Controllers\Api;

use App\ActivityLog;
use App\Classes;
use App\Http\Controllers\Controller;
use App\Schemes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public $time;
    function waiting()
    {
        dump($this->time);
        dd($this->time->endOfQuarter()->format('H:i'));
        $classes = Schemes::where('date', $this->time->toDateString())->where('start', $this->time->endOfQuarter()->format('H:i'))->pluck('class_id');
        $pupils = round(Classes::find($classes)->pluck('pupils')->sum() / 100 * 35);

        $waiting = max($pupils - (7.5 * 200),0);

        return $waiting;
    }

    public function passengers()
    {
        $classes = Schemes::where('date', Carbon::yesterday()->toDateString())->where('start', '10:15')->pluck('class_id');
        $pupils = round(Classes::find($classes)->pluck('pupils')->sum() / 100 * 35);
        $passengers = round(min(max($pupils / 7.5,0), 200));

        return $passengers;
    }

    public function index()
    {
        $this->time = Carbon::now();
        if (!empty(\request()->get('time'))) {
            $this->time = Carbon::parse(\request()->get('time'));
        }
        $waiting = $this->waiting();
        $passengers = $this->passengers();

        ActivityLog::create([
            'activity' => 'Getting the bus index',
            'application_user_id' => \request()->get('id')
        ]);

        return collect(['passenger'=> $passengers, 'waiting'=> $waiting]);
    }
}
