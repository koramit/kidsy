<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function apiRegisterUser(Request $request) {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user === NULL) {
            $user = User::create(['id' => $id]);
            // $user = User::find($id);
            // $user->permissions = 0;
            // $user->save();
            return response()->json(['resultCode' => 1, 'resultText' => 'User registerd.']);
        }

        return response()->json(['resultCode' => 2, 'resultText' => 'User already registerd.']);
    }

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->userAPI = new UserAPI;
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sap_id' => 'required|max:255',
            'name' => 'required|max:255',
            'name_eng' => 'required|max:255',
            'gender' => 'required',
            'dob' => 'required',
            'tel_no' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    // protected function create(Request $request) {
    //     return $request->all();
    // }
}
