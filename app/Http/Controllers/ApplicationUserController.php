<?php

namespace App\Http\Controllers;

use App\ApplicationUsers;
use Illuminate\Http\Request;

class ApplicationUserController extends Controller
{
    public function index() {
        $view = view('portal.users.index');
        $view->users = ApplicationUsers::paginate(15);

        return $view;
    }
}
