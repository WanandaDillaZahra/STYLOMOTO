<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\LogM;

class LoginC extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $logM = LogM::create([
                    'id_user' => Auth::user()->id,
                    'activity' => 'User Login'
                ]);
                $request->session()->regenerate();
                $request->session()->put('logM', $logM);
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        $logM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Logout'
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
