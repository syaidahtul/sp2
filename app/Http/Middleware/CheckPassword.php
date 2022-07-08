<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $to = Carbon::now();
        $from = Carbon::parse((auth()->user()->last_password_change ? auth()->user()->last_password_change : now() ));

        if (!empty(auth()->user()->last_password_change) || ( $to->diffInDays($from) > 92 )) {
            return $next($request);
        }
        
        return redirect()->route('user.forceChangePassword');
    }
}
