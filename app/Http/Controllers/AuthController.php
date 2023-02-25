<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect()->route('home');
    }

    public function callback()
    {
        $user = Socialite::driver('discord')->user();
        $dbUser = User::find($user->getId());

        if ($dbUser->rank === 'ADMIN') {
            Auth::login($dbUser);

            session()->put('discord_user', $user);
            session()->regenerate(true);

            return redirect()->intended('/dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
