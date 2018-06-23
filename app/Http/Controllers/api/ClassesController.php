<?php

namespace App\Http\Controllers\Api;

use App\Classes;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    public function index() {
        ActivityLog::create([
            'activity' => 'Getting the classes index',
            'application_user_id' => \request()->get('id')
        ]);

        return collect(['items'=>Classes::all()->pluck('name')]);
    }

    public function setPupils(\Illuminate\Http\Request $request) {
        ActivityLog::create([
            'activity' => 'The post form class is being set',
            'application_user_id' => \request()->get('id')
        ]);

        $class = Classes::where('name', $request->get('class'))->first();
        $class->pupils = $request->get('pupils');
        $class->save();

        return collect(['status'=> 'success']);
    }
}
