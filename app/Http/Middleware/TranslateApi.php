<?php

namespace App\Http\Middleware;

use Closure;

class TranslateApi
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
        $segment = $request->segment(1);

        if ($segment=="en"){
            dd($pl_rank);
        }

        return $next($request);
    }
}
