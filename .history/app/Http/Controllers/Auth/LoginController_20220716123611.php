<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }
    public function login(Request $request) {
        dd($request->all());

        $rules = [
            'email' => 'required | email',
            'password' => 'required'
        ];
        $messages = [
            'email.requied' => 'Bắt buộc nhập',
            'email.email' => 'Chưa đúng định dạng email',
            'password.required' => 'Bắt buộc nhập'
        ];
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        }
        return redirect("login")->with('msg','Đăng nhập thất bại');
    }

    public function registerForm() {

    }

    public function logout(Request $request) {
        Auth::logout();
        // Làm mất hiệu lực của session
        $request->session()->invalidate();
        // Reset Token
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
