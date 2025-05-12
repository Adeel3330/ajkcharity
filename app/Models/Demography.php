<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Demography extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function parent()
    {
        return $this->belongsTo(Demography::class, 'parent_id', 'id');
    }
}
