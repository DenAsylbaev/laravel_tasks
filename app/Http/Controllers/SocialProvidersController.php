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
    public function redirect()
    {
        // return Socialite::driver('vkontakte')->redirect();
        return Socialite::driver('github')->redirect();
    }

    public function callback(Social $social)
    {

        try {
            $githubUser = Socialite::driver('github')->user();
        } catch(\Exception $e) {
            return redirect('\login');
        } //gh
        $user = User::query()->where('email', '=', $githubUser->getEmail())->first(); // GH

        if(!$user) {
            $user = User::create([
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => Hash::make('secret'),
                'is_admin' => false,
            ]);
        } //gh

        $user->save();

        Auth::login($user, true);

        event(new DefineLoginEvent($user));
        return redirect(route('home'));



        // try {
        //     $socialUser = Socialite::driver('vkontakte')->user();
        // } catch(\Exception $e) {
        //     return redirect('\login');
        // } //VK
        // $authUser = $social->findOrCreateUser($socialUser);
        
        // dd($socialUser);
        // $user = User::query()->where('email', '=', $socialUser->getEmail())->first(); // VK

            // $user = User::where('email', $githubUser->getEmail())->first(); //gh
            
        // if(!$user) {
        //     $user = User::create([
        //         'email' => $socialUser->getEmail(),
        //         'name' => $socialUser->getName(),
        //         'avatar' => $socialUser->getAvatar(),
        //         'password' => Hash::make('secret'),
        //         'is_admin' => false,
        //     ]);
        // } // VK

        // $user->avatar = $socialUser->getAvatar();

    }
}
