<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;

class Permissions
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
		if( Request::is('dashboard*')) {
			if( Auth::check() && ((int)Auth::user()->active === 1) && ((int)Auth::user()->permissions === -5)) {
				return $next($request);
			} else if(Auth::check() && ((int)Auth::user()->active === 0)) {
//				Auth::logout();
				return redirect()->back();
			}
			return redirect('auth/login');
		}

		return $next($request);

	}

}
