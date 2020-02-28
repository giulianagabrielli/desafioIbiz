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

        if($user && $user->access_level_id != 3){
            return $next($request);
        } else {
            return redirect('/stop');
        }
    }
}
