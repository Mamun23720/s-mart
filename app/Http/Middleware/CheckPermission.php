<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(auth()->user()->role);
        if(auth()->user()->role->name == 'Admin' || checkPermission(Route::currentRouteName()))
        {
            return $next($request);
        }
        toastr()->error('Permission Denied !!');
        return redirect()->back();
    }
}
