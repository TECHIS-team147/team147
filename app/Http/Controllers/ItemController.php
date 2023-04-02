<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

/**
 * 登録画面表示
 */
    public function register_form()
    {
        return view('item/register');   

    }

/**
 *　商品登録メソッド
 */
    public function itemRegister(Request $request)
    {
    // dd($request);
    //新しくレコードを作成する
    $item = new Item();
    $item->user_id = $request->user_id;
    $item->name = $request->name;
    $item->type = $request->type;
    $item->detail = $request->detail;
    $item->image = $request->image;
    $item->save();

    return redirect('/item/register');
    }


/**
 * IDを取得して編集画面に移動
 */
    public function edit(Request $request)
    {
        $item =Item::where('id', '=', $request->id)->first();

        return view('items/edit')->with(
            'item', $item
        );
    }

/**
 * 編集画面
 */
    public function itemEdit(Request $request){

        //既存の昆虫レコードを取得して、準備して保存する
        $item = Item::where('id', '=', $request->id)->first();
        $item->user_id = $request->user_id;
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;
        $item->image = $request->image;
        $item->save();
    
        return redirect('/item/register');
    
        }
/**
 * 削除メソッド
 */
        public function itemDelete(Request $request){
            //既存の昆虫レコードを取得して、削除する
            $item = Item::where('id', '=', $request->id)->first();
            $item->delete();
        
            return redirect('/item/register');

            }



}
