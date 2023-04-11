<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品一覧画面</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>
<body id="page_top"> 

    <!-- ナビゲーションを表示 -->
    @include('parts.navi')  
    <!-- <div class="">商品一覧画面</div>-->

    <div class="container">     

        <!-- 検索窓を実装 -->
        <div>
        <form action="{{ route('home/list.index') }}" method="GET" >
            @csrf
            <div ><input type="text" class="col-5" name="keyword" value="{{ $keyword }}">
            <input type="submit" class="col-1" value="検索"></div>        
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
                    <th>更新日時</th>
                    <th></th>
                </thead>
                <!-- foreachで値を取り出したい配列変数名itemsから変数名itemとしてデータが取り出される -->
                @foreach($items as $item)   
                    <tr class="text-aline=left">

                        <!-- 変数名itemとして取り出されたデータからidを取得 -->
                        <td><?php $id = htmlspecialchars("{$item->id}",ENT_QUOTES,"UTF-8");
                            echo $id;
                            ?></td>                         
                        <!-- 変数名itemとして取り出されたデータからnameを取得 -->
                        <td><?php $name = htmlspecialchars("{$item->name}",ENT_QUOTES,"UTF-8");
                            echo $name;
                            ?></td>   
                        <!-- 変数名itemとして取り出されたデータからtypeを取得し、配列変数名typesによって取得したtypeの数値を文字列にして取得 -->                       
                        <td><?php $type = htmlspecialchars("{$types[$item->type]}",ENT_QUOTES,"UTF-8");
                            echo $type;
                            ?></td>   
                        <!-- 変数名itemとして取り出されたデータからdetailを取得し、nl2br関数でデータベースに入力した通りに改行 -->                       
                        <td><?php $detail =htmlspecialchars("{$item->detail}",ENT_QUOTES,"UTF-8");
                            echo nl2br($detail) ;
                            ?></td>        
                        <!-- 変数名itemとして取り出されたデータからupdated_atを取得 -->                  
                        <td>{{$item->updated_at}}</td>  
                        <!-- 詳細をクリックで/home/detail/{{$item->id}}へ遷移 -->     
                        <td class="text-center"><a href="/home/detail/{{$item->id}}">詳細</a></td>

                    </tr>
                @endforeach
                
            </table>
        </div>    
    </div> 
    
    <!-- TOPに戻るボタンを実装-->
    <div class="row">
        <a href="#page_top" class="page_top_btn">トップへ戻る</a>
    </div>

</body>
</html>