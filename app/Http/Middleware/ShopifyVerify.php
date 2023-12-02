<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopifyVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if shop parameter is present in the request
        $shopDomain = $request->input('shop');
        $host = $request->input('host');
      //  $host = $request->input('target');
      //  dd($host);

        // Allow access to the next middleware or route handler
        return $next($request);
    }
}
