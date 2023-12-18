<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Interfaces\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\DefineLoginEvent;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Social $social, string $driver)
    {
        try {
            $socialUser = Socialite::driver($driver)->user();
        } catch(\Exception $e) {
            return redirect('\login');
        }

        $user = User::query()->where('email', '=', $socialUser->getEmail())->first(); // GH

        if(!$user) {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make('secret'),
                'is_admin' => false,
            ]);
        }

        $user->save();

        Auth::login($user, true);

        event(new DefineLoginEvent($user));
        return redirect(route('home'));

        // $user->avatar = $socialUser->getAvatar();

    }
}
