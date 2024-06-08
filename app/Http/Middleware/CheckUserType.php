<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$types
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        Log::info('Middleware CheckUserType invoked.');

        if (Auth::check()) {
            $user = Auth::user();
            Log::info('User is authenticated', ['user_id' => $user->id, 'user_type' => $user->tipe_user]);

            if (in_array($user->tipe_user, $types)) {
                Log::info('User type matches', ['user_type' => $user->tipe_user]);
                return $next($request);
            } else {
                Log::warning('User type does not match', ['user_type' => $user->tipe_user]);
            }
        } else {
            Log::warning('User is not authenticated');
        }

        return redirect('/unauthorized')->with('error', 'You do not have access to this resource.');
    }
}
