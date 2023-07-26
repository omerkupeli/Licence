<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function setUserRole(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı!');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Kullanıcı rolü güncellendi!');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back();
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id);
        return view('user.show', compact('user'));
    }

    public function getAllUsers()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
}
