<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Demography;
use Illuminate\Http\Request;

class DemographyController extends Controller
{
   public function index(Request $request)
   {
        $demography = Demography::query()
         ->when($request->filled('search'), function ($query) use ($request) {
            return $query->search($request->search); // <-- return added here
         })
         ->when($request->has('type'), function ($query) use ($request) {
            return $query->where('type', $request->type); // <-- return also safe here
         })
          ->whereIn('type', ['DISTRICT', 'PROVINCE', 'TEHSIL'])
         ->paginate(10);

        $type = isset($request->type)? $request->type :'all';

        return view('admin.demography.demoindex',compact('demography','type'));
   }
}
