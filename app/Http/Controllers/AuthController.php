<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view("auth/register");
    }

    public function handleregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'username' => 'required|string|min:3|max:100',
            'email' => 'required|email:filter|min:3|max:100',
            'password' => 'required|string|min:7|max:100'
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route("auth.login"));
    }


    public function login()
    {
        return view("auth.login");
    }

    public function handlelogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:filter|max:100|min:7',
                'password' => 'required|string|max:100|min:7'
            ]
        );
        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($is_login) {
            return view("profile/index");
        } else {
            return redirect()->route('auth.login')->with('failed_login', 'wrong email or password');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('auth.login');

    }

   
}
