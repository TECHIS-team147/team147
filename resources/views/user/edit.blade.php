<?php
        //$_POSTの中身を確認してみる。
        //print_r($_POST);
    ?>
 
    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ユーザー編集</title>
    </head>
    <body>
        <h3>ユーザー編集</h3>
        <!-- actionが編集ボタンを押した時に呼ばれるURLとなる -->
        <form action="/user/update" method="post">
            @csrf
            <p> ID:
                {{ $user->id }}
                <input type="hidden" name="id" value="{{ $user->id }}"></p>

                <p>お名前
                <input type="text" name="name" value="{{ $user->name }}"></p>

                <p>メールアドレス
                <input type="text" name="email" value="{{ $user->email }}"></p>

                <p>登録日時:{{ $user->created_at }}
 
                <p>更新日時:{{ $user->updated_at }}

            <p>管理者権限(0:ユーザー/1:管理者)
                <label for="gender_male"><input type="radio" name="role" value="0" {{ $user->role == '0' ? 'checked' : ''}}>0</label>
                <label for="gender_woman"><input type="radio" name="role" value="1" {{ $user->role == '1' ? 'checked' : ''}}>1</label>
            </p>
 
            
            
            <p><input type="submit" value="編集"></p>
        </form>
        <!-- 削除のフォームは別で用意する -->
        <form action="/user/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}"></p>
            <p><input type="submit" value="削除"></p>
        </form>
        <!-- エラーメッセージ表示 -->
        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    </body>
    </html>