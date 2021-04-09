<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialAuthFacebookController extends Controller
{

    public function login()
    {
        return view('login');
    }
    /**
     * Create a redirect method to facebook api.
     *
     * @return RedirectResponse
     */
    public function redirect(){

        return Socialite::driver('facebook')->redirect();
    }    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        // OAuth Two Providers

        // All Providers
        $details['id'] = $user->getId();
        $details['token'] = $user->token;
        $details['expires'] =  $user->expiresIn;
        $details['nickname'] = $user->getNickname();
        $details['name'] = $user->getName();
        $details['email'] = $user->getEmail();
        $details['avatar'] = $user->getAvatar();

        $app_user = User::firstOrCreate(['email' => $details['email']],['name'=>$details['name'],'avatar' => $details['avatar'],'password'=>bcrypt('unsecure')]);

        auth()->login($app_user);
        return redirect()->to('/home');
    }
}
