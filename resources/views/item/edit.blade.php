@extends('item.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <title>Document</title>
</head>
<body>
<h2 style="margin: 50px">昆虫 商品編集画面 {{$item->id}}</h2>
        <form action ="{{ route('itemEdit') }}" method ="post">
        {{ csrf_field() }}
 
        <input type="hidden" name="id" value = "{{$item->id}}">
          <div class="form-group" style="margin: 20px">
          <label>名前</label>
                    <input class="form-control" type="text" name="name" value ="{{$item->name}}">
          </div>

          <div class="form-group">
                    <label>種別</label>
                    </div>
                    @foreach($types as $key=>$value)

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="{{$key}}" @if($key==$item->type) checked @endif>
                    <label class="form-check-label" for="inlineRadio1">{{$value}}</label>
                    </div>
                    @endforeach
                    <br><br>


          <label>詳細</label>
          <div class="form-group" textarea name="detail" cols="30" rows="10" type="text"
          value ="{{$item->detail}}"></textarea>
          </div>


          <div class="form-group" style="margin: 20px">
          <textarea name="detail" cols="30" rows="10">{{$item->detail}}</textarea>
          </div>

          <div>
          <label for="formFileMultiple" class="form-label">画像</label>
          <input class="form-control" type="file" accept="image/*" id="formFileMultiple" multiple value ="{{$item->image}}">
           </div>


          <div class="form-group" style="margin: 20px">
                    <button type ="submit" class="btn btn-secondary">編集</button>
          </div>


          
      </form>
      <form action ="{{ route('itemDelete') }}" method ="post">
        {{ csrf_field() }}
        <input class ="form-control" type="text" name="id" value = "{{$item->id}}" hidden>
      <div class="form-group" style="margin: 20px">
          <button type ="submit" class="btn btn-secondary">削除</button>
          </div>
          </form>

       

          
</body>
</html>
@endsection