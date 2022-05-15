<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Auth;

class GoogleController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $findUser = User::where('provider_id', $user->id)->first();

            if($findUser) {

                Auth::login($findUser);

                return redirect()->intended('/');

            }else{

                $newUser = new User;

                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->provider_id = $user->id;
                $newUser->password = bcrypt('password');
                $newUser->save();

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
