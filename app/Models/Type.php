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
    use HasFactory;
    protected $guarded = [];

     public function parent()
    {
        return $this->belongsTo(Type::class, 'parent_id', 'id');
    }
    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('parent', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            });
        }
        return $query;
    }
}
