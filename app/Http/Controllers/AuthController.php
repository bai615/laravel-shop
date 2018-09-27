<?php
namespace App\Http\Controllers;

use Socialite;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        var_dump($user->original);
        var_dump($user->provider);
        var_dump($user->username);
        var_dump($user->nickname);
        var_dump($user->avatar);
        var_dump($user);
        dd($user->token);
        var_dump($user->avatar);
        // $user->token;
    }
}