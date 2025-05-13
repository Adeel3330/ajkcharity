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
    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'parent_id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);

        

        try {
            Demography::create($data);
            return redirect()->route('admin.demography')->with('message', ' Demography Created Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function create()
    {
        $demographies=Demography::where('parent_id',null)->get();
        return view('admin.demography.create',compact('demographies'));
    }

    public function edit(Demography $demography)
    {
        $demographies = Demography::where('parent_id', null)->get();
        return view('admin.demography.edit', compact('demography', 'demographies'));
    }

    public function update(Request $request, Demography $demography)
    {
        $data = $request->validate([
            'parent_id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);
        try {
            Demography::where('id', $demography->id)->update($data);
            return redirect()->route('admin.demography')->with('message', 'Demography Updated Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function destroy(Demography $demography)
    {
        $demography->delete();
        return redirect()->route('admin.demography')->with('message', 'Demography Deleted Successfully');
    }

}
