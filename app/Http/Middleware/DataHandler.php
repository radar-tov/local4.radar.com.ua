<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class DataHandler implements Middleware
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
		$input = [];

		foreach($request->all() as $key=>$value) {
			if(method_exists($this, $method = 'handle'.ucfirst(camel_case($key)))) {
				$input[$key] = $this->$method($value,$request);
			}
		}

		$request->merge($input);

		return $next($request);
	}

	/**
	 * Handle ukrainian,russian or english alpha characters
	 * @param $value
	 * @param $request
	 * @return mixed|string
	 */
	protected function handleSlug($value, $request)
	{
		if(empty($value) && $request->has('title')) {
			$value = $request->get('title');
		} else if (empty($value) && $request->has('name')) {
			$value = $request->get('name');
		}

		$value = strtr($value,config('translate.ru'));
		$value = preg_replace('/[^a-zA-Z0-9-]/','-',$value);
		$value = preg_replace('/-{2,}/','-',$value);

		return strtolower($value);
	}

}
