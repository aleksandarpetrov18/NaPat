<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;


class GetUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) : Response
     {
       /* $userId = auth()->id(); // Get the ID of the authenticated user
      
        $request->attributes->add(['user_id' => $userId]);*/
     
        return $next($request);
    }
}
