<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Session::has('locale')) {
            if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            } else {
                $lang = 'de';
            }

            if ($lang != 'de') {
                $lang = 'en';
            }

            Session::put('locale', $lang);
        }

        App::setlocale(Session::get('locale'));

        date_default_timezone_set('Europe/Berlin');

        return $next($request);
    }
}
