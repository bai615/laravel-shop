<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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

        /*
         * 输出信息:
         * AccessToken {#321 ▼
        #attributes: array:3 [▼
        "access_token" => "ebeeedd5ce12fba8b716463a6fe133a2a3be095e"
        "token_type" => "bearer"
        "scope" => "user:email"
        ]
        }
         */
    }
}
