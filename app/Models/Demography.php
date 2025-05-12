<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Demography extends Model
{
    use softDeletes;
    protected $guarded=[];
     public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    // ->orWhere('type', 'like', "%{$search}%")
                    ->orWhereHas('parent', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            });
        }
        return $query;
    }
    public function parent()
    {
        return $this->belongsTo(Demography::class, 'parent_id', 'id');
    }
}
