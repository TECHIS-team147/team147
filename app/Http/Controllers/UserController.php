<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    public function edit(Request $request, $id)
    {
        // idでのUser tableの検索
        $user = User::where('id', '=', "$id")->first();
        return view('user.edit', compact("user"));
    }

    // このupdateメソッドに,User情報を更新する処理を書く
        // ブラウザからのパラメータを受け取る処理
        // Userモデルを呼び出して，更新処理
        // Viewであるedit.blade.phpを呼び出す処理
        //return view('user.index');
    public function update(Request $request)
    {
        $rule=[
            'name' => 'required|max:100',
            'email' => 'required|email',
        ];
        $msg=[
            'name.required' => '名前は必須です。',
            'name.max' => '名前の文字数は100文字以内です。',
            'email.required'  => 'メールは必須項目です。',
            'email.email'  => 'メールの形式で入力してください。',
        ];
        $request->validate($rule,$msg);

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    return redirect('/user');

    

        
    }

    // このdeleteメソッドに,削除の処理を書く
    public function delete(Request $request)
    {

        {
            $user = User::find($request->input('id'));
        $user->delete();
            return redirect('/user');
        }
    }

}