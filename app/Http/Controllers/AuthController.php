<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function logIn()
    {
        // if (session('username') == 'a' && session('password') == 1) {
        //     return view('home.index');
        // }
    }
}
