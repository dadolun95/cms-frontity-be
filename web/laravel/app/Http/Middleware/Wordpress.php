<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class Wordpress
 * @package App\Http\Middleware
 */
class Wordpress
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        require(dirname(__DIR__) . '/../../../wp/wp-load.php');
        return $next($request);
    }
}
