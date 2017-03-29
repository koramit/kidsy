<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\APIs\UserAPI;

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
    protected $redirectTo = '/authenticated';

    private $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
        $this->UserAPI = new UserAPI;
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        
        $user = $this->UserAPI->login($request->all());

        if ($user['resultCode'] == 1) { // success.
            Auth::loginUsingId($user['id'], FALSE); // FALSE = not set remember_token.
            //
            return $this->sendLoginResponse($request);
            //
        }

        return back()->with('alert', $user['resultText']);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        // $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // if ($user->canUseResource('admin-panel')) return redirect('/dashboard');

        // return redirect('/biopsycases/queue');
    }

    public function logout() {
        Auth::logout();
        return redirect(env('SNIT_HOST'));
    }
}
