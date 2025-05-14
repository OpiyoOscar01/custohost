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
    $token = $request->cookie('sso_token');

    if (!$token) {
        Auth::logout(); // kill Laravel session
        return redirect()->route('login.redirect', ['app' => 'custohost']);
    }

    $personalAccessToken = AuthAccessToken::findToken($token);


    if (
        !$personalAccessToken ||
        !$personalAccessToken->tokenable ||
        ($personalAccessToken->expires_at && now()->greaterThan($personalAccessToken->expires_at))
    ) {
        Auth::logout(); // also log out if token expired or tampered
        return redirect()->route('login.redirect', ['app' => 'custohost']);
    }

    Auth::login($personalAccessToken->tokenable); // re-sync Laravel session
    return $next($request);
}


}
