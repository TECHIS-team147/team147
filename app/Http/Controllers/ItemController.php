<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index(Request $request)
    {
        $items =Item::all();
        // dd($items);
        // 連想配列を取得する
        $types = Item::TYPES;
        return view('item/index',compact('items','types'));   

    }

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
        // rule
        $rule=[
            'name' => 'required|max:100',
            'type' => 'required',
            'detail' => 'required|max:500',
        ];
        // nameのどんなruleに対して、適用されなかった場合どんなmessageを設定するか
        $msg=[
            'name.required' => '商品名は必須です',
            'name.max' => '100文字以内で入力してください',
            'type.required' => '種別の選択は必須です',
            'detail.required' => '詳細は必須です',
            'detail.max' => '500文字以内で入力してください'
        ];

        $request->validate($rule, $msg);
        $path = $request->image->getRealPath();
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // $image = base64_encode(file_get_contents($request->image->getRealPath()));


    // dd($request);
    //新しくレコードを作成する
    $item = new Item();
    $item->user_id = auth::id();
    $item->name = $request->name;
    $item->type = $request->type;
    $item->detail = $request->detail;
    $item->image = $image;

    $item->save();

    return redirect('/item/register');
    }

    // public function upload(Request $request)
    // {
    //     // ディレクトリ名
    //     $dir = 'img';

    //     // アップロードされたファイル名を取得
    //     $file_name = $request->file('image')->getClientOriginalName();

    //     // 取得したファイル名で保存
    //     $request->file('image')->storeAs('public/' . $dir, $file_name);

    //     return redirect('/item/register');
    // }

    // public function upload(Request $request)
    // {
    //     // ディレクトリ名
    //     $dir = 'img';

    //     // imgディレクトリに画像を保存
    //     $request->file('image')->store('public/' . $dir);

    //     return redirect('/item/register');
    // }


/**
 * IDを取得して編集画面に移動
 */
    public function edit(Request $request)
    {
        $item =Item::where('id', '=', $request->id)->first();
        // 連想配列を取得する
        $types = Item::TYPES;
        return view('item/edit',[
            'item'=> $item,
            'types'=> $types
        ]);
    }

/**
 * 編集画面
 */
    public function itemEdit(Request $request){

        // ruleで必須項目や制限文字数などを設定する
        $rule=[
            'name' => 'required|max:100',
            'type' => 'required',
            'detail' => 'required|max:500',
        ];
        // nameのどんなruleに対して、適用されなかった場合どんなmessageを設定するか
        $msg=[
            'name.required' => '商品名は必須です',
            'name.max' => '100文字以内で入力してください',
            'type.required' => '種別の選択は必須です',
            'detail.required' => '詳細は必須です',
            'detail.max' => '500文字以内で入力してください'
        ];

        $request->validate($rule, $msg);


        //既存の昆虫レコードを取得して、準備して保存する
        $item = Item::where('id', '=', $request->id)->first();
        // $item->user_id = $request->user_id;
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;

        $path = $request->image->getRealPath();
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $item->image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $item->save();

        // if($image=$request->file('image')){
        //     $path=$image->store('public');
        //     $item->image=$path;
        // }
    
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
