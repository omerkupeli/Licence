<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function sendWelcomeEmail(Request $request)
    {
        $user = Auth::user();
        $userEmail = $user->email;
        
        Mail::to($userEmail)->send(new WelcomeMail());
        
        return response()->json(['message' => 'Welcome email sent successfully']);
    }
}

