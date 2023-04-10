@extends('item.layouts.app2')
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
<div class="form">
  <h2 style="margin: 50px">昆虫 商品編集画面 {{$item->id}}</h2>
    <form action ="{{ route('itemEdit') }}" method ="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      
          <input type="hidden" name="id" value = "{{$item->id}}">

          <div class="form-group">
            <label>名前</label><br>
            <input name="name" type="text" class="form-control" value="{{ old('name', $item->name) }}">
              <!-- <input class="form-control" type="text" name="name" value ="{{$item->name}}"> -->
                <ul>
                  @if ($errors->has('name'))
                    <li>{{$errors->first('name')}}</li>
                  @endif
                </ul>
        
          <div class="form-group">
            <label>種別</label><br>
          </div>
            @foreach($types as $key=>$value)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="{{$key}}" @if($key==old('type',$item->type)) checked @endif>
                <label class="form-check-label" for="inlineRadio1">{{$value}}</label>
              </div>
            @endforeach
          

            <ul>
              @if ($errors->has('type'))
               <li>{{$errors->first('type')}}</li>
             @endif
            </ul>
          </div>
          <br>

          <div class="form-group">
            <label>詳細</label><br>
            <textarea name="detail" cols="60" rows="10">{{ old('detail', $item->detail) }}</textarea>
          </div>
            <ul>@if ($errors->has('detail'))
                <li>{{$errors->first('detail')}}</li>
                @endif
            </ul>
            <br>
          
          <div>
            <label for="formFileMultiple" class="form-label">画像</label>
            <input class="form-control" name="image" type="file" accept="image/*" id="formFileMultiple" multiple value ="{{$item->image}}">
          </div><br>
          @if(! is_null($item->image))
            <img src="{{ $item->image }}">
            @endif
          <br><br>

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
      
      <a href="/item/index">一覧へ戻る</a>

       
         
</div>
          
</body>
</html>
@endsection