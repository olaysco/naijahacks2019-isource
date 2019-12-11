<?php

namespace App\Http\Middleware;

use App\Constants\Levels;
use Closure;
use Illuminate\Support\Facades\Auth;

class BusinessInvestor
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
        if(Auth::user()->level == Levels::$BUSINESSINVESTOR) {
            return $next($request);
        }else {
            if($request->expectsJson()){
                return response()->json(['message'=>'aunthenticated'], 403);
            }else{
                return redirect('/');
            }
        }
    }
}
