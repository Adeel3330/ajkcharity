<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Demography;
use Illuminate\Http\Request;

class DemographyController extends Controller
{
   public function index()
   {
        $demography= Demography::paginate(10);
        return view('admin.demography.demoindex',compact('demography'));
   }
}
