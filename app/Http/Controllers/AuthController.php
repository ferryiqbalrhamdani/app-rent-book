<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek login valid
        if (Auth::attempt($credentials)) {
            // cek status
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. Please contact admin!');
                return redirect('/login');
            }
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 2) {
                return redirect('books-list');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Account is not register');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function registerProcess(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register success. Please contact admin to actived your account!');
        return redirect('register');
    }
}
