<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use App\User;
use Hash;
class googleController extends Controller
{   
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function handleProviderCallback()
    // {
    //     $user = Socialite::driver('github')->user();
    // }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'google_id'=> $user->id,
                    'role'=> '3',
                    'password'=> ''
                ]);

                Auth::login($newUser);
                return redirect('/');

            }


        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
