<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        if (Auth::user()->canUseResource('admin-panel')) return view('admin-panel.dashboard');
    }

    public function notAllow() {
        return view('app.not-allow');
    }

    // public function checkUserForRegister(Request $request) {
    //     return $request->all();
    // }

    
}
