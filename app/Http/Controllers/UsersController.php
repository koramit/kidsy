<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    
    // Route Protection. Required authenticated user.
    public function __construct() {
        $this->middleware('auth');
    }

    public function authenticated() {

        if (Auth::user()->canUseResource('admin-panel')) return redirect('/dashboard');

        return redirect('/biopsycases/queue');

        return 'UsersController@authenticated';
    }

    public function dashboard() {
        if (Auth::user()->canUseResource('admin-panel')) {
            
            $users = User::all();

            return view('admin-panel.dashboard', compact('users'));
        }

        return 'dashboard need implementation.';
    }

    public function edit($id) {
        if (Auth::user()->canUseResource('admin-panel')) {
            
            $user = User::find($id);

            // return $user;
            return view('admin-panel.permissions', compact('user'));
        }

        return redirect('/not-allow');
    }

    public function update(Request $request) {
        $user = User::find($request->input('_id'));
        if ( $user !== NULL ) {
            // return $request->all();
            $user->updatePermissions($request->all());

            // return $user;
            return redirect('/dashboard')->with('status', $user->getData('name') . ' permissions granted!');
        }
        return redirect('/not-allow');
    }

    public function notAllow() {
        return view('app.not-allow');
    }

    // public function checkUserForRegister(Request $request) {
    //     return $request->all();
    // }

    
}
