<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // API loyihada redirect qilish o‘rniga null qaytaramiz
        abort(response()->json([
            'success' => false,
            'message' => 'Unauthenticated.'
        ], 401));
    }
}
