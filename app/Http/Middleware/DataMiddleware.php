<?php

namespace App\Http\Middleware;

use Closure;

class DataMiddleware
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
        if(time() % 2 == 0){
            return redirect('/tabel-karyawan');
        }
        return $next($request); // untuk memferifikasi bener ga requstnya sesusai dengan datanya contoh seperti login
    }
}
