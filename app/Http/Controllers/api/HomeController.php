<?php

namespace App\Http\Controllers\Api;

use App\ApplicationUsers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function subscribe() {
        $key = str_random(16).str_random(16).str_random(16).str_random(16);
        $user = ApplicationUsers::create([
            'app_key' => $key
        ]);
        return json_encode([$key, $user->id]);
    }
}
