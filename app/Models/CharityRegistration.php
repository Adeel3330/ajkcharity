<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharityRegistration extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function province(){
        return $this->hasONe(Demography::class)->where('type','PROVINCE');
    }
    public function district(){
        return $this->hasONe(Demography::class)->where('type','DISTRICT');
    }
    public function tehsils(){
        return $this->hasMany(Demography::class)->where('type','TEHSIL');
    }

    public function document()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'document');;
    }

    public function challanForm()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'challan');
    }
}
