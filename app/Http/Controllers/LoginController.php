<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authen(Request $request)
    {//validasi data
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
    

    //credential user
    $credentials = $request->only('username', 'password');
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        $user = Auth::user();
        if($user){
            return redirect()->intended('/admin/dashboard');
        }
    }else{
        return back()->withErrors(['username'=>'Username atau Password salah'])->withinput();
    }
}
public function logout(){
    Auth::logout();

    request()->session()->invalidate();
    
    request()->session()->regenerateToken();
    
    return redirect('/');
}
}
