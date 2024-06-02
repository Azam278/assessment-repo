<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $loginFields = $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);
    
        if (auth()->attempt(['email' => $loginFields['user_email'], 'password' => $loginFields['user_password']])) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'You are logged in!');
        }
    
        return back()->withErrors([
            'user_email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function dashboard() {
        $companies = Companies::paginate(5);
        return view('dashboard', compact('companies'));
    }
}
