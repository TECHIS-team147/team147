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
          <title>商品登録画面</title>
</head>
<body>
<div class="m-5">
    <div class="form">
        <div class="form_title form-select-lg">商品登録画面</div><br>
            <div class="form_content">
                <form action = "{{ route('itemRegister') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <!-- <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul> -->
                    <div class="form-group">
                        <label>名前</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                            <ul>
                                @if ($errors->has('name'))
                                    <li>{{$errors->first('name')}}</li>
                                @endif
                            </ul> 
                    </div>
                    <br>

                    <div class="form-group">
                        <label>種別</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="1" {{ old('type') === '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">カブトムシ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="2" {{ old('type') === '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">クワガタムシ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="3" {{ old('type') === '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">蝶</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="4" {{ old('type') === '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio4">蝉</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="5" {{ old('type') === '5' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio5">バッタ</label>
                            </div>
                            <ul>
                                @if ($errors->has('type'))
                                    <li>{{$errors->first('type')}}</li>
                                @endif
                            </ul>
                    </div>
                    <br><br>

                    <div class="form-group">
                        <label>詳細</label><br>
                        <textarea name="detail" cols="60" rows="10" placeholder="500文字以内で入力してください" value="{{ old('detail') }}">{{ old('detail') }}</textarea>
                    </div>
                        <ul>
                            @if ($errors->has('detail'))
                                <li>{{$errors->first('detail')}}</li>
                            @endif
                        </ul>
                    <br>

                    <div>
                        <label for="formFileMultiple" class="form-label">画像</label>
                        <input class="form-control" name="image" type="file" accept="image/*" id="formFileMultiple" multiple value="{{ old('image') }}">

                        <ul>  
                            @if ($errors->has('image'))
                                <li>{{$errors->first('image')}}</li>
                                @endif
                        </ul>
                    </div><br><br>

                    <div>
                        <input type="submit" name="" value="登録">
                    </div><br>

                    <a href="/item">一覧へ戻る</a>

                </div>
          </form>  
            
        </div>
    </div> 
</div>
</body>
</html>
@endsection