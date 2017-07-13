<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function showRegisterForm ()
    {
        return view('auth.register');
    }

    public function register (Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());
        $role = Sentinel::findRoleBySlug('member');
        $role->users()->attach($user);

        return redirect(route('home'));
    }

    public function showLoginForm ()
    {
        return view('auth.login');
    }

    public function login (Request $request)
    {
        Sentinel::authenticate($request->all());
        return redirect(route('home'));
    }

    public function logout ()
    {
        Sentinel::logout();
        return redirect(route('home'));
    }
}