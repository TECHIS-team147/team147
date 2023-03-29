<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品一覧画面</title>
</head>
<body>  
    @include('parts.navi')  
    <!-- <div class="">商品一覧画面</div>-->

    <div class="container"> 

        <!-- 検索窓を実装 -->
        <div>
        <form action="{{ route('home/list.index') }}" method="GET" >
            @csrf
            <div ><input type="text" class="col-11" name="keyword" value="{{ $keyword }}">
            <input type="submit" class="col"value="検索"></div>
        </form>
        </div><br>

        <!-- 商品一覧画面表示 -->
        <div>
            <table class="table table-bordered">
                <thead class="">
                    <th>ID</th>
                    <th>名前</th>
                    <th>種別</th>
                    <th>概要</th>
                    <th></th>
                </thead>
                @foreach($items as $item)   <!-- foreachでの配列変数名itemsに変数名itemとしてデータ格納される -->
                    <tr class="text-aline=left">
                        <td>{{$item->id}}</td> <!-- 変数名itemとして格納されているデータからidを取得 -->
                        <td>{{$item->name}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->detail}}</td>
                        <td class="text-center"><a href="/home/detail/{{$item->id}}">詳細</a></td>
                        <!-- <td> -->
                        <!-- <button class="col-12 btn"  type="submit">詳細</button> -->
                        <!-- </td> -->
                    </tr>
                    @endforeach

            </table>
        </div>    
    </div>  

</body>
</html>