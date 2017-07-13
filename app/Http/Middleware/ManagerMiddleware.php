<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ManagerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Sentinel::inRole('manager'))
            return $next($request);

        return redirect(route('login'));
    }
}