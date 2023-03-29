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


    
    public function index(Request $request)
    {
        //検索窓を表示
        $keyword = $request->input('keyword');

        $query = DB::table("items");

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        return view('home.list', [
             'items' => $items,
             'keyword' => $keyword
        ]);
        //return view('home.list', compact('items', 'keyword'));
    }



    //商品一覧を表示
    public function list()
    {
        //Itemモデルから全てのデータを持ってくる　ひとまず変数は$listにした
        // $list = Item::all();

        //DB(データベース）のitemsテーブルから全てのデータを取得。モデルではなくDBから取得する場合は、table名とアロー演算子(->)の記載必須。
        $items = DB::table('items')->get();   //getメソッドではallメソッド同様に全ての情報を取得できる。但し、whereを使って特定の値も取得できる。
        

        //きちんとブラウザに表示されるか確認
        //dd($items);

        //商品一覧画面を表示
        return view('home.list', ['items' => $items]); //配列名書き方'items'〇〇〇〇〇〇
        // return view('home.list',['lists'=>$list-item] );
    }   
    



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
        return view('home.detail', ['item' => $item]);
        // return view('home.detail',['lists'=>$list] );
    }   







}
