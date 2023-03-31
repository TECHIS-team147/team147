<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{   
    use HasFactory;
 
    //種別の数字を文字列にする（constを定義して呼び出すようにする）
    const TYPES = [
        1 => "カブトムシ",
        2 => "クワガタ",
        3 => "蝶",
        4 => "蝉",
        5 => "バッタ",
    ];           

}

