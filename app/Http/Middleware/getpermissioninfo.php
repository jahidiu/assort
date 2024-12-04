<?php

namespace App\Http\Middleware;

use Closure;
use App\Group;
use Illuminate\Support\Facades\Auth;

class getpermissioninfo
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
        // permission data goes here
        $permissions = auth::user()->group->permission;
        $request->session()->put('permissions', $permissions);

        return $next($request);
    }
}
