<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sns extends Model
{
    use SoftDeletes;
    protected $fillable = [   // <---　追加
        'user_id', 'body',
    ];
}
