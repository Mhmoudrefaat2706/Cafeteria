<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Google Login
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            Log::error('Google Redirect Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'Error connecting to Google. Please check the app configuration.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Validate required data
            if (!$googleUser->email || !$googleUser->name) {
                return redirect()->route('login')
                    ->with('error', 'Unable to retrieve required data from Google.');
            }

            // Check for valid email format
            if (!filter_var($googleUser->email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->route('login')
                    ->with('error', 'Invalid email address.');
            }

            return DB::transaction(function () use ($googleUser) {
                // First check by Google ID
                $user = User::where('google_id', $googleUser->id)->first();

                if (!$user) {
                    // Check by email
                    $existingUser = User::where('email', $googleUser->email)->first();

                    if ($existingUser) {
                        // Link existing account with Google
                        $user = $existingUser;
                        $user->update([
                            'google_id' => $googleUser->id,
                            'avatar' => $googleUser->avatar ?? $user->avatar,
                            'provider' => $user->provider ?: 'google',
                            'email_verified_at' => $user->email_verified_at ?: now(),
                        ]);
                    } else {
                        // Create new user
                        $user = User::create([
                            'name' => $googleUser->name,
                            'email' => $googleUser->email,
                            'google_id' => $googleUser->id,
                            'avatar' => $googleUser->avatar,
                            'provider' => 'google',
                            'role' => 'user',
                            'password' => Hash::make(Str::random(16)),
                            'email_verified_at' => now(),
                        ]);
                    }
                } else {
                    // Update existing user data
                    $user->update([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'avatar' => $googleUser->avatar ?? $user->avatar,
                    ]);
                }

                Auth::login($user, true);

if ($user->role === 'admin') {
    return redirect()->route('dashboard.home')
        ->with('success', 'Welcome Admin! You are now logged in.');
} else {
    return redirect()->route('user.home')
        ->with('success', 'Successfully logged in.');
}

            });

        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            Log::error('Google Invalid State Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'Request expired. Please try again.');
        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'An error occurred during Google login. Please try again.');
        }
    }

    // Facebook Login
    public function redirectToFacebook()
    {
        try {
            return Socialite::driver('facebook')->redirect();
        } catch (\Exception $e) {
            Log::error('Facebook Redirect Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'Error connecting to Facebook. Please check the app configuration.');
        }
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Validate required data
            if (!$facebookUser->email || !$facebookUser->name) {
                return redirect()->route('login')
                    ->with('error', 'Unable to retrieve required data from Facebook. Please ensure email access is granted.');
            }

            // Check for valid email format
            if (!filter_var($facebookUser->email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->route('login')
                    ->with('error', 'Invalid email address.');
            }

            return DB::transaction(function () use ($facebookUser) {
                // First check by Facebook ID
                $user = User::where('facebook_id', $facebookUser->id)->first();

                if (!$user) {
                    // Check by email
                    $existingUser = User::where('email', $facebookUser->email)->first();

                    if ($existingUser) {
                        // Link existing account with Facebook
                        $user = $existingUser;
                        $user->update([
                            'facebook_id' => $facebookUser->id,
                            'avatar' => $facebookUser->avatar ?? $user->avatar,
                            'provider' => $user->provider ?: 'facebook',
                            'email_verified_at' => $user->email_verified_at ?: now(),
                        ]);
                    } else {
                        // Create new user
                        $user = User::create([
                            'name' => $facebookUser->name,
                            'email' => $facebookUser->email,
                            'facebook_id' => $facebookUser->id,
                            'avatar' => $facebookUser->avatar,
                            'provider' => 'facebook',
                            'role' => 'user',
                            'password' => Hash::make(Str::random(16)),
                            'email_verified_at' => now(),
                        ]);
                    }
                } else {
                    // Update existing user data
                    $user->update([
                        'name' => $facebookUser->name,
                        'email' => $facebookUser->email,
                        'avatar' => $facebookUser->avatar ?? $user->avatar,
                    ]);
                }

                Auth::login($user, true);

if ($user->role === 'admin') {
    return redirect()->route('dashboard.home')
        ->with('success', 'Welcome Admin! You are now logged in.');
} else {
    return redirect()->route('user.home')
        ->with('success', 'Successfully logged in.');
}
            });

        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            Log::error('Facebook Invalid State Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'Request expired. Please try again.');
        } catch (\Exception $e) {
            Log::error('Facebook Login Error: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'An error occurred during Facebook login. Please try again.');
        }
    }
       public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }
public function handleGitHubCallback()
{
    try {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::where('github_id', $githubUser->id)->first();

        if (!$user) {
            $existingUser = User::where('email', $githubUser->getEmail())->first();

            if ($existingUser) {
                $user = $existingUser;
                $user->update([
                    'github_id' => $githubUser->id,
                    'provider' => 'github',
                    'avatar' => $githubUser->getAvatar(),
                ]);
            } else {
                $user = User::create([
                    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                    'email' => $githubUser->getEmail(),
                    'github_id' => $githubUser->id,
                    'provider' => 'github',
                    'avatar' => $githubUser->getAvatar(),
                    'role' => 'user',
                    'password' => Hash::make(Str::random(16)),
                    'email_verified_at' => now(),
                ]);
            }
        }

        Auth::login($user, true);

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.home')->with('success', 'Welcome Admin! You are now logged in.');
        } else {
            return redirect()->route('user.home')->with('success', 'Successfully logged in.');
        }
} catch (\Exception $e) {
    Log::error('GitHub Login Error: ' . $e->getMessage(), [
        'trace' => $e->getTraceAsString(),
    ]);
    return redirect()->route('login')->with('error', 'An error occurred during GitHub login.');
}

}

}
