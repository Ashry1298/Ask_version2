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
  
}
