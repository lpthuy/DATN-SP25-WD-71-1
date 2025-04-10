<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipperMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'shipper') {
            return $next($request);
        }

        return response()->json(['message' => 'Bạn không có quyền truy cập.'], 403);
    }
}
