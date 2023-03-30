<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ホーム画面</title>
</head>
<body>
    <!-- ナビゲーションを表示 -->
    @include('parts.navi')
    <!-- <div class="">ホーム画面</div>-->  

    <div class="container">
        <!-- <div class="side">
            <div class="side-header">商品管理システム</div>
            <div class="side-body">
            </div>
        </div> -->
        <div class="main">
            
            <div class="main-body">
                <div class="">ホーム画面へようこそ</div>

                <!-- 画像を表示 -->
                <div class="container">

                <div class="">
                    <img class="img1" src="{{ asset('img/insect.png') }}" alt="昆虫">
                </div>
                
                <!-- <div class="row">
                    <div class="col-5">
                    <img class="img1" src="{{ asset('img/カブトムシ.png') }}" alt="カブトムシ">
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-5">
                    <img class="img2" src="{{ asset('img/クワガタムシ.png') }}" alt="クワガタムシ">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="">
                    <img class="img4" src="{{ asset('img/セミ.png') }}" alt="セミ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                    <img class="img3" src="{{ asset('img/チョウ.png') }}" alt="チョウ">
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-5">
                    <img class="img5" src="{{ asset('img/バッタ.png') }}" alt="バッタ">
                    </div>
                </div> -->
                

                </div>
            </div>
        </div>


    </div>

</body>
</html>