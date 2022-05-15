<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MakeWordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now = date('Y-m-d', strtotime(now()));

        $word = \App\Models\Word::where('expired', 0)->whereDate('created_at', '=', $now)->first();

        if (!$word) {
            $word = new \App\Models\Word;
            $word->word = mt_rand(10000, 99999);

            $word->save();
        }

        return $next($request);
    }
}
