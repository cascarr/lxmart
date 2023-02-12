<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\


class LxAuthController extends Controller
{
    // return the login view
    public function index() {

        if(Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.login');

    }

    // function for login submission
    public function customLogin(Request $request) {

        // validating the user inputs
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // passing the inputs to a variable
        $credentials = $request->only('email', 'password');

        // verify if this user exist in the record
        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }

        return Redirect('/');

    }

    // return the registration view
    public function registration() {

        if(Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.registration');

    }

    // function for registration submission
    public function customRegistration(Request $request) {

        // validating the user entered inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // passing the user entered inputs to a variable
        $data = $request->all();

        // store that data in the database
        $check = $this->create($data);

        // redirect the user to login page on successful registration
        return redirect('userauth/login')->withSuccess('Sign in');

    }

    // function to register the user data in the database.
    public function create(array $data) {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }

    // function to signout the user
    public function signOut() {

        // clear session record
        Session::flush();
        Auth::logout();

        return Redirect('/');

    }

}
