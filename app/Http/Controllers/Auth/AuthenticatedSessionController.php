<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    // public function create(): View
    // {
    //     return view('auth.login');
    // }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();
    
        // Regenerate the session to prevent session fixation
        $request->session()->regenerate();
    
        // Get the redirect URL from the session
        $redirect = session()->get('redirect', route('dashboard'));
    
        // Redirect the user to the intended page or dashboard
        return redirect()->intended($redirect);
    }

  

    public function loginWithToken(Request $request)
    {
        $token = $request->cookie('sso_token');
    
        if (!$token) {
            return redirect()->route('login')->withErrors('Token missing.');
        }
    
        try {
            $personalAccessToken = PersonalAccessToken::findToken($token);
    
            if (!$personalAccessToken) {
                return redirect()->route('login')->withErrors('Invalid token.');
            }
    
            $user = $personalAccessToken->tokenable;
    
            // Log the user ID for debugging
            Log::info('User from token', ['user_id' => $user?->id]);
    
            if (!($user instanceof \App\Models\User)) {
                return redirect()->route('login')->withErrors('User not found.');
            }
    
            Auth::login($user);
            
            $request->session()->regenerate();
    
            return redirect()->intended(route('dashboard'));
    
        } catch (\Exception $e) {
            Log::error('Token login error', ['error' => $e->getMessage()]);
            return redirect()->route('login')->withErrors('Authentication failed.');
        }
    }
    
    
 
    
    public function logout(Request $request)
    {
        Auth::logout();
    
        $domain = env('APP_ENV') === 'local' ? '.custospark.test' : '.custospark.com';
    
        $cookie = Cookie::forget('sso_token', '/', $domain);
    
        // Invalidate after response is done with CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login')->withCookie($cookie);
    }
    
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
      
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
