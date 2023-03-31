<!DOCinput TYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>アカウント登録</title>
</head>
<body>
    <div class="container text-center" style="max-width:500px;">
    <h1>商品管理システム</h1>
        <h3>アカウント登録</h3>
            <form action="/account/create" method="post">
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
                        <th>名前</th>
                        <td> <input type="text" name="name" /></td>
                    </tr>
                        <th>メールアドレス</th>
                         <td> <input type="text" name="email" /></td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td> <input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <th>パスワード(確認)</th>
                        <td> <input type="password" /></td>
                    </tr>
                </table>
                <div>
                    <input type="submit" value="アカウント登録" />
                <div>
            </form>
    <a href="/">やっぱり登録していた方</a>
</div>
</body>
</html>