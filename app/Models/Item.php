<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
        'image',
    ];
    
    const TYPES = [
        '1'=>'カブトムシ',
        '2'=>'クワガタムシ',
        '3'=>'蝶',
        '4'=>'蝉',
        '5'=>'バッタ'
    ];
}
