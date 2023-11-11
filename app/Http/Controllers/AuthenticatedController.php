<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function index()
    { 
        return view('auth.login');
    }

    public function CheckLogin(Request $request)
    {  
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password'); 
        if (Auth::attempt($credentials)) { 
            return redirect()->route('users.index')->with('success', 'ยินดีต้อนรับเข้าสู่ระบบ.');
        }
        return redirect()->route('login')->with('error', 'รายละเอียดการล็อกอินไม่ถูกต้อง โปรดลองใหม่อีกครั้ง !');
    } 
 
    public function logout(Request $request)
    { 
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'ออกจากระบบสำเร็จ.');
    }

}
