<?php

namespace App\Http\Controllers\Api;

use App\Classes;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    public function index() {
        return collect(['items'=>Classes::all()->pluck('name')]);
    }

    public function setPupils(Request $request) {
        $class = Classes::where('name', $request->get('class'))->first();
        $class->pupils = $request->get('pupils');
        $class->save();

        return collect(['status'=> 'success']);
    }
}
