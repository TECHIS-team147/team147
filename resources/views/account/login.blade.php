<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ログイン</title>
</head>
<body>
    <div class="container text-center" style="max-width:500px;">
    <h1>商品管理システム</h1>
        <h3>ログイン</h3>
        <form action="/account/login" method="post">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                @csrf
            <table class="table">
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td><input type="text" name="password" /></td>
            </tr>
            </table>
            <div>
                <input type="submit" value="ログイン" />
            </div>
        </form>
        <a href="/account/regist">アカウント登録をしていない方</a>
    </div>
</body>
</html>