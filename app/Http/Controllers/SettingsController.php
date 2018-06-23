<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index ()
    {
        $view = view('portal.settings.index');
        $view->settings = Setting::all();

        return $view;
    }

    public function save (Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);

        $setting = Setting::find($request->get('id'));
        $setting->value = $request->get('value');
        $setting->save();

        return redirect()->back();
    }
}
