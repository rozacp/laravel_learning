<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->isAdmin()) {

            return $next($request);
        }

        return redirect()->route('pages.home')->with([ 'flash_info' => 'Not an admin, GTFO!' ]);
    }
}
