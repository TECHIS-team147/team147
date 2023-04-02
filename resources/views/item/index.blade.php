@extends('item.layouts.app')
@section('content')
<a href="/item/itemRegister">新規登録</a>
<table>
          <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>種別</th>
                    <th>更新日時</th>
                    <th>　</th>
          </tr>
          @foreach($items as $item)
          <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$types[$item->type]}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="/item/edit/{{$item->id}}"> >>編集</a></td>
          </tr>
          @endforeach
</table> 
@endsection