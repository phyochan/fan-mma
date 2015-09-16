<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{

    private $openRoutes = ['api/getcount/{id}'];
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];



//modify this function
    public function handle($request, Closure $next)
    {
        //add this condition
        foreach($this->openRoutes as $route) {

            if ($request->is($route)) {
                return $next($request);
            }
        }

        return parent::handle($request, $next);
    }




}
