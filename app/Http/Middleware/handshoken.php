<?php

namespace App\Http\Middleware;

use App\ApplicationUsers;
use Closure;

class handshoken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!empty($request->get('id')) && !empty($request->get('key'))) {
            $user = ApplicationUsers::find($request->get('id'));
            if ($user->app_key === $request->get('key')) {
                return $next($request);
            }
        }
    }
}
