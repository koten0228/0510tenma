<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AccountController extends Controller
{




    public function showRegister()
    {
        return view('account.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'password.min' => 'パスワードは8文字以上入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'email.unique' => 'このメールアドレスは既に登録されています。'
        ];

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:125|unique:users',
            'password' => 'required|max:255|min:8|confirmed',
        ], $messages);

        User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }

    public function index()
    {
        if (Auth::check()) {
            // ログイン済みユーザーはホームページへリダイレクト
            return redirect('/home');
        }

        // ログイン済みでないユーザーはログインページを表示
        return view('account.login');
    }


    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }


        return back()->withErrors([
            'loginError' => '正しいemailならびにパスワードを入力してください。',
        ]);


    }


    public function logout(Request $request)
    {

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



}
