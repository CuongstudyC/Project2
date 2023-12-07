<?php

namespace App\Http\Middleware;

use App\Models\admin_remember;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rememberAdmin = admin_remember::all();
        foreach($rememberAdmin as $re){
            $cout  = 1;
        }
        if(!empty($cout)){
            session()->forget('id');
            return $next($request);
        } else if(session('id')){
            return $next($request);
        }
        else{
            return redirect(url('/admin'));
        }
    }
}
