<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

class AccountController extends Controller
{
  public function regist()
  {
    return view('account.regist');
  }
  public function create(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'email'=>'required|max:255|email|unique:users,email',
      'password'=>'required|numeric',
    ],
     [
      'name.required' => '名前は必ず入力してください。',
      'email.max:255|email|unique:users,email'=>'メールアドレスに間違いがあります。',
      'email.required' =>'メールアドレスを必ず入力してください。',
      'password.numeric'=>'パスワードに間違いがあります。',
      'password.required'=>'パスワードは必ず入力してください。',
     ]);
    User::create([
      "name" => $request->name,
      "email" => $request->email,
      "password" => Hash::make( $request->password),
      "role" => 0,
    ]);

    return redirect('/');
  }

  public function showlogin()
  {
    return view('account.login');
  }

  public function login(LoginFormRequest $request)
  {
    $credentials = $request->only('email', 'password', );

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect('/home')->with('login_success', 'ログイン成功しました');
    }

    return back()->withErrors([
      'login_error' => 'メールアドレスかパスワードが間違っています。',
    ]);
  }
  public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}