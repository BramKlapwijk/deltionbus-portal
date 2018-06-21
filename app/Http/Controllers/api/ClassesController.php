<?php

namespace App\Http\Controllers\Api;

use App\Classes;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    public function index() {
        return collect(['items'=>Classes::all()->pluck('name')]);
    }
}
