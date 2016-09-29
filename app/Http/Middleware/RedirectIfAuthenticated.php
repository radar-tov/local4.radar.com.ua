<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\URL;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
	        if($this->auth->user()->isAdmin() && URL::previous() == url('auth/login')){
		        return redirect('dashboard');
	        }
	        else return redirect()->route('cabinet');
        }

        return $next($request);
    }
}
