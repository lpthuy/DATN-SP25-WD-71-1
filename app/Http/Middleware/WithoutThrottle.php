<?php

namespace App\Http\Middleware;

use Closure;

class WithoutThrottle
{
    public function handle($request, Closure $next)
    {
        // Bỏ giới hạn throttle cho route này
        $request->route()->middlewarePriority = array_diff(
            $request->route()->middlewarePriority ?? [],
            ['throttle']
        );

        return $next($request);
    }
}
