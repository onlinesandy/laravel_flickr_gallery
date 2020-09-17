<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;

class LoginController extends Controller {

    public function index() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            $request->session()->put('uname', Auth::user()->name);
            $request->session()->put('uemail', Auth::user()->email);
            $request->session()->put('uid', Auth::user()->id);
            return redirect()->intended('cat_list');
        } else {
            return redirect()->back()->withErrors(['email' => 'Whoops! invalid username or password.']);
        }
    }

    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return Redirect::to("/login")
                        ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
    }

}
