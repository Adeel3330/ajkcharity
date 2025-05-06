<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function parent(){
        return $this->belongsTo(Type::class,'parent_id','id');
    }
}
