<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{


    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    public function handle($request, Closure $next)
    {
        if(strpos($request->getRequestUri(), 'api') >= 0)
        {
            return $next($request);
        }
        return parent::handle($request, $next);
    }


//modify this function





}
