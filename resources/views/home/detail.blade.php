<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>詳細画面</title>
</head>
<body>
    <!-- ナビゲーションを表示 -->
    @include('parts.navi')
    <!-- <div class="h1">詳細画面</div> -->


    <div class="container"> 
        <div class="row">            
            <div class="col-12 mt-3">         
            <div class="col-2">
            </div>     
            <div class="col-8">
                <h4 class="detail_header text-center">商品詳細 商品ＩＤ：{{$item->id}}</h4>
                <p class="">更新日時  {{$item->updated_at}}</p>
                <form action="/home/detail" method="post" class="">
                    @csrf
                    <table class="table table-bordered">
                        <tr><th class="text-center">名前</th>
                            <td><p class="text-start">
                                <?php $name = htmlspecialchars("{$item->name}",ENT_QUOTES,"UTF-8");
                                echo $name;
                                ?></p>
                            </td>
                        </tr>
                        <tr><th class="text-center">種別</th>
                            <td><p class="text-start">
                                <?php $type = htmlspecialchars("{$types[$item->type]}",ENT_QUOTES,"UTF-8");
                                echo $type;
                                ?></p>
                            </td>
                        </tr>          
                        <tr><th class="text-center">概要</th>
                            <td><p class="text-start">
                                <?php $detail =htmlspecialchars("{$item->detail}",ENT_QUOTES,"UTF-8");
                                echo nl2br($detail) ;
                                ?></p>
                            </td>
                        </tr> 
                        <tr><th class="text-center">写真</th>
                            <td class="table-img">
                                @if(! is_null($item->image))
                                <img src="{{ $item->image }}">
                                @else
                                <p>画像はありません</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </form>
            </div>             
            <div class="col-2">
            </div>     
            </div>
        </div>
    </div>
</body>
</html>

