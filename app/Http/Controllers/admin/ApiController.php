<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demography;
class ApiController extends Controller
{
    public function getProvincesData(Request $request,$provinceId){
        $districts = Demography::where([
            'type'=>'DISTRICT',
            'parent_id'=>$provinceId,
        ])->get();
       
        return response()->json($districts);
    }
}
