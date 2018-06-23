<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $view = view('portal.activity-log.index');

        $view->logs = ActivityLog::paginate(15);

        return $view;
    }
}
