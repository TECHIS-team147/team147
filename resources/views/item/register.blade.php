@extends('item.layouts.app')
@section('content')
    <div class="form">
        <div class="form_title form-select-lg">昆虫登録画面</div><br>
        <div class="form_content">
            <form action = "{{ route('itemRegister') }}" method="post">
            {{ csrf_field() }}


                    <div class="form-group">
                    <label>名前</label>
                    <input name="name" type="text" class="form-control">
                    </div>
                    <br>

                    <div class="form-group">
                    <label>種別</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">カブトムシ</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">クワガタムシ</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="3">
                    <label class="form-check-label" for="inlineRadio3">蝶</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio4">蝉</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="5">
                    <label class="form-check-label" for="inlineRadio5">バッタ</label>
                    </div>
                    <br><br>
                    <div class="form-group">
                    <label>詳細</label><br>
                    <textarea name="detail" cols="30" rows="10"></textarea>
                    </div>
                    <br>
                    </select>

                    <div>
                    <label for="formFileMultiple" class="form-label">画像</label>
                    <input class="form-control" type="file" accept="image/*" id="formFileMultiple" multiple>
                    </div>
                    <br>

                    <div>
                    <input type="submit" name="" value="登録">
                    </div>

                </div>
            </form>    
        </div>
    </div> 
@endsection