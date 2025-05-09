<?php
namespace App\Http\Middleware;

use App\Models\AuthAccessToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class SsoTokenAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        $token = $request->cookie('sso_token');

        if (!$token) {

            return redirect()->route('login.redirect', ['app' => 'custohost']);
        }
        $personalAccessToken = AuthAccessToken::findToken($token);

        if (!$personalAccessToken || !$personalAccessToken->tokenable) {
            return redirect()->route('login.redirect', ['app' => 'custohost']);

        }

        Auth::login($personalAccessToken->tokenable);

        return $next($request);
    }
}
