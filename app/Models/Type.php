<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder\Function_;
use Symfony\Component\Console\Descriptor\Descriptor;

class Type extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function parent(){
        return $this->belongsTo(Type::class,'parent_id','id');
    }

    use HasFactory;
    public function scopeFilter($query,array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');       
        }
       
    }
    
}
