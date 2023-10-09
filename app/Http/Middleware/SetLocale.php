<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    // all the routes will pass through this middleware, so we can set locale here

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1); // get the first url segment as the localse

        if(in_array($locale, ['en', 'fr', 'hi'])) {
            app()->setLocale($locale);      // set the application locale
        } else {
            app()->setLocale('en');         // default fallback if the locale is not found/supported
        }

        return $next($request);
    }
}

