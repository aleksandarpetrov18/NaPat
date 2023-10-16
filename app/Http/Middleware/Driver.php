<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\RolesId;
use App\Models\Roles;

class Driver
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not authenticated
        if (!auth()->check()) {
            return $request->expectsJson() ? response()->json(['message' => 'Unauthenticated'], 401) : new RedirectResponse(route('login'));
        }
        // Get the ID of the authenticated user
        $user = $request->user()->id;
        $userId = auth()->id();
        //$request->attributes->add(['user_id' => $userId]);

        // Retrieve the user's role ID from the database
        $role_id = RolesId::where('user_id', $user)
            ->select('role_id')
            ->first();

        if ($role_id === null) {
            return $request->expectsJson() ? response()->json(['message' => 'Access Denied'], 403) : new RedirectResponse(route('login'));
        }

        // Retrieve the name of the role associated with the user
        $role = Roles::where('id', $role_id->role_id)
            ->select('name')
            ->first();

        if ($role === null) {
            return $request->expectsJson() ? response()->json(['message' => 'Access Denied'], 403) : new RedirectResponse(route('login'));
        }

        if ($role->name === 'Driver') {
            return $next($request);
        }

        return $request->expectsJson() ? response()->json(['message' => 'Access Denied'], 403) : new RedirectResponse(route('login'));
    }
}
