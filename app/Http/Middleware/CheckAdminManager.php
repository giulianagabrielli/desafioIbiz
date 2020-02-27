<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminManager
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
        $user = Auth::user();

        if($user && $user->access_level_id == 1 || $user->access_level_id == 2){
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
