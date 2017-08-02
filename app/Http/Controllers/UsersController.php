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

        if (Auth::user()->canUseResource('view-biopsy-case-index')) return redirect('/biopsycases');        
        
        return redirect('/biopsycases/queue');
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

            return view('admin-panel.permissions', compact('user'));
        }

        return redirect('/not-allow');
    }

    public function update(Request $request) {
        $user = User::find($request->input('_id'));
        if ( $user !== NULL ) {
            $user->updatePermissions($request->all());

            return redirect('/dashboard')->with('status', $user->getData('name') . ' permissions granted!');
        }
        return redirect('/not-allow');
    }

    public function notAllow() {
        return view('app.not-allow');
    }

    public function addResident() {
        return view('admin-panel.add-resident');
    }

}
