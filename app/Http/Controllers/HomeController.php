<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        //ホーム画面を表示
        return view('home.home' );
    }   


    
    public function index(Request $request)  //こちらの関数だけで一覧表まで表示できた
    {
        //$request->input('keyword')でユーザーが検索フォームに入力した値を取得して変数keywordに格納
        $keyword = $request->input('keyword');

        //クエリビルダでデータベースからitemsテーブルのデータを変数queryに格納
        $query = DB::table("items");

        //検索フォームが空でない場合（検索フォームにkeywordが入力されたら）、
        //nameカラム、typeカラム、detailカラムで前方・後方・部分一致するものを検索して変数queryへ格納  
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")  //LIKEを用いる場合は第３引数は""で囲む
                ->orWhere('type', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%");
        }
        
        //変数queryからデータを取り出し変数itemsに格納する。ただし、update_atのデータで降順とする。
        $items = $query->orderBy('updated_at','desc')->get();

        //配列itemsで変数itemsに格納したデータをupdate_atのデータで降順にして一覧表示。検索フォームには入力した値を表示
        return view('home.list', [
             'items' => $items,
             'keyword' => $keyword,
             'types' => Item::TYPES, //Itemモデルからconst TYPESの配列を呼び出し
        ]);

        //return view('home.list', compact('items', 'keyword'));
    }



    // //商品一覧を表示・・・index関数だけで一覧表まで表示できたのでコメントアウトした
    // public function list()
    // {
    //     //Itemモデルから全てのデータを持ってくる　ひとまず変数は$listにした
    //     // $list = Item::all();

    //     //DB(データベース）のitemsテーブルから全てのデータを取得。モデルではなくDBから取得する場合は、table名とアロー演算子(->)の記載必須。
    //     $items = DB::table('items')->get();   //getメソッドではallメソッド同様に全ての情報を取得できる。但し、whereを使って特定の値も取得できる。

    //     //きちんとブラウザに表示されるか確認
    //     //dd($items);

    //     //商品一覧画面を表示
    //     return view('home.list', ['items' => $items]); //配列名書き方'items'〇〇〇〇〇〇
        
    // }   
    
    //商品詳細画面を表示
    public function detail(Request $request)
    {
        //Itemモデルから全てのデータを持ってくる。ひとまず変数は$listにした
        // $list = Item::all();

        //dd($request->item_id);

        //ＤＢのitemsテーブルの全てのデータからidを見つけてくる
        $item = DB::table('items')->find($request->id);    //findメソッドでは引数にidを指定しないとエラーになる

        //きちんとブラウザに表示されるか確認
        //dd($items);

        //商品詳細画面を表示
        return view('home.detail',[
          'item' => $item,
          'types' => Item::TYPES,
        ]);
        // return view('home.detail',['lists'=>$list] );
    }   







}
