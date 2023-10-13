<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RolesId;
use App\Models\Roles;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (auth()->check()) {
            $user = $request->user()->id;
            $role_id = RolesId::where('user_id',$user)
                ->select('role_id')
                ->first()->toArray();
            $role = Roles::where('id', $role_id)
                ->select('name')
                ->first()->toArray();
               if ($role == "Driver") {
                return $next($request);
               }else {
                return $next($request);
               }
        } else {

        }

return $next($request);
    }
}
