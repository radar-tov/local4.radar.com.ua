<?php

namespace App\Http\Middleware;

use Closure;

class HandleSlug
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
        if($request->has('slug')){
            $request['slug'] = str_slug($request->get('slug'));
        }
        return $next($request);
    }
}
