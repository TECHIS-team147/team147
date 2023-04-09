@extends('item.layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset('css/style_at.css') }}">
          <title>Document</title>
</head>
<body>

<div class="m-5">
<div class="form">
  <h2>昆虫 商品編集画面 {{$item->id}}</h2>
    <form action ="{{ route('itemEdit') }}" method ="post" enctype="multipart/form-data"><br>
        {{ csrf_field() }}
      
          <input type="hidden" name="id" value = "{{$item->id}}">

          <div class="col-xs-4">
            <label>名前</label><br>
            <input name="name" type="text" class="form-control" value="{{ old('name', $item->name) }}"><br>
              <!-- <input class="form-control" type="text" name="name" value ="{{$item->name}}"> -->
                <ul>
                  @if ($errors->has('name'))
                    <li>{{$errors->first('name')}}</li>
                  @endif
                </ul>
          </div>
        
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
            <textarea name="detail" cols="80" rows="10">{{ old('detail', $item->detail) }}</textarea>
          </div>
            <ul>@if ($errors->has('detail'))
                <li>{{$errors->first('detail')}}</li>
                @endif
            </ul>
            <br>
          
          <div>
            <label for="formFileMultiple" class="form-label">画像</label>
            <input class="form-control" type="file" name="image" accept="image/*" id="formFileMultiple" multiple value ="{{$item->image}}" onchange="previewImage(this);">
          </div><br>

          <p id="preview_text_before"></p>
              <ul>
              @if ($errors->has('image'))
                <li>{{$errors->first('image')}}</li>
                @endif
              </ul>
              @if(! is_null($item->image))
                <img src="{{ $item->image }}">
                @endif
                <br><br>
                <p id="preview_text"></p>
          <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:350px;">
              
          <br>

          <div class="form-group" style="margin: 20px">
            <button type ="submit" class="btn btn-secondary">保存</button>
          </div>


          
      </form>
      <form action ="{{ route('itemDelete') }}" method ="post">
        {{ csrf_field() }}
        <input class ="form-control" type="text" name="id" value = "{{$item->id}}" hidden>
          <div class="form-group" style="margin: 20px">
            <button type ="submit" class="btn btn-secondary">削除</button>
          </div>
      </form>
      
      <a href="/item">一覧へ戻る</a>

       
         
</div>
</div>

<script>
function previewImage(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
  document.getElementById('preview_text_before').innerHTML = "変更前の画像";
  document.getElementById('preview_text').innerHTML = "変更後の画像";
}
</script>   

</body>
</html>
@endsection