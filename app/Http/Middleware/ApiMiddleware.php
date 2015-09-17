<?php namespace App\Http\Middleware;

use Closure;

class ApiMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
     *
	 */



	public function handle($request, Closure $next)
	{
        if(($request->header("APIKEY") != "7g5AGW47e0v1UL4U7uq53SCXi6oOGgQp")) {
            return "You don't have permission to access on this server.";
        }
		return $next($request);
	}

}
