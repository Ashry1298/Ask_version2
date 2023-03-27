<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\throwException;

class HomeController extends Controller
{

    public function profile()
    {
        return view('profile.index');
    }
    public function search($username)
    {
        $user_data = User::where('username', '=', $username)->first();
        if ($user_data) {
            return view('profile.search', compact('user_data'));
        } else {
            return redirect()->route('profile.index')->with('account', "Sorry We haven't account for this name");
        }
    }
}
