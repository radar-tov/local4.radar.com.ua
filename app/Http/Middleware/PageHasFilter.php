<?php

namespace App\Http\Middleware;

use Closure;

class PageHasFilter
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
	    $request->merge(['filter' => true]);
        return $next($request);
    }
}
