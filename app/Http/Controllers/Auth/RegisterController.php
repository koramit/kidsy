<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\APIs\UserAPI;
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
    public function __construct() { 
        $this->middleware('auth', ['except' => 'apiRegisterUser']);
    }

    protected function registerUser($id) {
        $user = User::find($id);

        if ($user === NULL) {
            $user = User::create(['id' => $id]);
            return ['resultCode' => 1, 'resultText' => 'User registerd.'];
        }

        return ['resultCode' => 2, 'resultText' => 'User already registerd.'];
    }

    public function apiRegisterUser(Request $request) {
        return response()->json($this->registerUser($request->input('id')));
    }

    public function autoCreateUser(Request $request) {
        $api = new UserAPI;
        $user = $api->checkUser($request->input('org_id'));
        if ( isset($user['document_id']) && $user['org_position_id'] == '70000030' ) { // Resident OK.
            $user['expiry_date'] = $request->input('expiry_date');
            $user = $api->createReadyToUseAccount($user);
            
            if ($user['resultCode'] == 1) { // Create user in KIDSY.
                $result = $this->registerUser($user['id']);
                $user = User::find($user['id']);
                $user->permissions = 58;
                $user->save();
            }
            
            return redirect('/dashboard')->with('status', $user->getData('name') . ' account created.');
        }

        return redirect('/dashboard')->with('alert', 'ไม่สามารถสร้าง account ได้เนื่องจาก SAP ID ไม่ใช่ resident.');
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
    
}
