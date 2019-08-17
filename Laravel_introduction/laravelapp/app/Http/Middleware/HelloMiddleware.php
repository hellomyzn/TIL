<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        $data = [
            ['name'=>'hoge', 'mail'=>'hoge@hoge.com'],
            ['name'=>'fuga', 'mail'=>'fuga@fuga.com'],
            ['name'=>'piyo', 'mail'=>'piyo@piyo.com'],
        ];

        $request->merge(['data'=>$data]);
        return $next($request);
    }
}
