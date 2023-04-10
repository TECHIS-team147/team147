
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>管理者一覧</title>
</head>
<body>
@include('parts.navi')
    <H1>管理者一覧</H1>
    
    <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>管理者権限(0:ユーザー1:管理者)</th>   
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <!-- <th>登録日時</th> -->
                    <!-- <th>更新日時</th> -->
                    <th> </th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->role}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <!-- <td>{{$user->created_at}}</td> -->
                    <!-- <td>{{$user->updated_at}}</td> -->
                    <td><a href="/user/edit/{{$user->id}}">>>編集</a></td>
                </tr>
                @endforeach
    </table>