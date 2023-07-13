<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
   public function validate_registration(Request $req)
    {
        $req->validate([
            'name'  =>  'required',
            'email'  =>  'required|email|unique:users',
            'password'  =>  'required|min:5|max:12',
        ]);
        $data = $req->all();
        User :: create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $req -> has('is_admin') ? true : false,
        ]);
        
        return redirect('login')->with('succes', 'Kullanıcı başarıyla eklendi.');
    }
}
