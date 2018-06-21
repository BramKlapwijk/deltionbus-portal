<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index() {
        $view = view('portal.classes.index');

        $view->search = session()->get('classes:search');
        $view->classes = Classes::where('name', 'like', '%'.$view->search['name'].'%')
            ->orWhere('slug', 'like', '%'.$view->search['name'].'%')
            ->orderBy(empty($view->search['sort']) ? 'name' : 'pupils', empty($view->search['sort']) ? 'ASC' :'DESC')
            ->paginate(15);

        return $view;
    }

    public function search(Request $request) {
        session()->put('classes:search', $request->all());
        return redirect()->to('/classes');
    }
}
