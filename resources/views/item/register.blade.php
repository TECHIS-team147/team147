<!DOCTYPE html>
<html lang="ja">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="{{ asset('css/style.css') }}">
          <title>Document</title>
</head>
<body>
<body>
    <div class="form">
        <div class="form_title">昆虫登録フォーム</div>
        <div class="form_content">
            <form action = "{{ route('itemRegister') }}" method="post">
            {{ csrf_field() }}
                <div class="form_list">

                    <label>ID</label>
                    <input name="user_id" type="text" class="">

                    <label>名前</label>
                    <input name="name" type="text" class="">
    
                    <label>種別</label>
                    <input name="type" type="type" class="">
    
                    <label>詳細</label>
                    <input name="detail" type="detail" class="">

                    <label>画像</label>
                    <input name="image" type="email" class="">
    
                    <input type="submit" name="" value="登録">
                </div>
            </form>    
        </div>
    </div> 
</body>
</html>