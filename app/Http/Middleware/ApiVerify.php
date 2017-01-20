<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Request;

class ApiVerify
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
        if(Request::ajax()){
            $key = Request::header('Api-Key');
            if(decrypt($key)==env('API_KEY')){
                return $next($request);
            }else{

                return response('unauthorized', 401)
                    ->header('Content-Type', 'text/plain');
            }
        }else{
            return response('unauthorized', 403)
                ->header('Content-Type', 'text/plain');
        }

    }
}
