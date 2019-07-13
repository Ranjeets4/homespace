<?php

namespace App\Http\Middleware;

use Closure;

class adminValidation
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
        if (!session('homespace_admin_id')) {
            
            return redirect('admin');
        }
        return $next($request);
    }
}
