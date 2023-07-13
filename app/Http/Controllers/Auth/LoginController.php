<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   public function validate_login(Request $req)
{
    $req->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:5|max:12',
    ]);

    $credentials = $req->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/home');
    }

    return redirect('login')->with('fail', 'Giriş yapılamadı.');

}

public function logout()
{
    Auth::logout();
    return redirect('login');


}

}