<?php

namespace Lara\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Lara\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Lara\Mail\createUser;
use Lara\Mail\setUserPassword;
use Lara\Roles;
use Lara\User;
use Laravel\Socialite\Facades\Socialite;
use Hash;
use Auth;
use Mail;

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
    protected $redirectTo = '/index';

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
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole(Roles::ADMIN)|| $user->hasRole(Roles::SUPER_ADMIN)) {
            // do your margic here
            return redirect()->route('adminka.index');
        }

        return redirect('/');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    private function _createNewUser($userSocialite)
    {
        $password = str_random(8);
        $user  = User::create([
            'name'     => $userSocialite->getName(),
            'email'    => $userSocialite->getEmail(),
            'fb_id'    => $userSocialite->getId(),
            'password' => Hash::make($password),
        ]);

        if ($user) {
            Mail::to($user)->queue(new setUserPassword($user));
        }

        return true;
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $userSocialite = Socialite::driver('facebook')->user();
        if (!$userSocialite) {
            return redirect('/login');
        }

        $user = User::where('email', $userSocialite->getEmail())->first();
        if (!$user) {
            $this->_createNewUser($userSocialite);
        }

        if (is_null($user->fb_id)){
            $user->fb_id = $userSocialite->getId();
            $user->save();
        }

        Auth::loginUsingId($user->id);
        return redirect('/');
    }

}
