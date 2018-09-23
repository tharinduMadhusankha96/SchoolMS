<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
//        return view('adminDashboard');

        if(Auth::attempt([

            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();

//            dd($user->admin);

            if($user->admin == 1)
            {
                return redirect('/adminDashboard')->with('success' , 'Logged in as an Admin');
            }

            return redirect('/home');

        }
        else{
            return redirect()->back()->with('error' , 'Error Logging in , check yout credentials again');

        }
    }
}
