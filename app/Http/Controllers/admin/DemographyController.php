<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Demography;
use Illuminate\Http\Request;

class DemographyController extends Controller
{
    public function index()
    {
        $demography = Demography::paginate(10);
        return view('admin.demography.demoindex', compact('demography'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->validate([
            'parent_id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);
       
        try {
            Demography::create($data);
            return redirect()->route('admin.demography')->with('message', 'New Demography Created Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function create() {
        return view('admin.demography.create');
    }

    public function edit(Demography $demography)
    {
        return view('admin.demography.edit',compact('demography'));
    }

    public function update(Request $request, Demography $demography)
    {
        $data= $request->validate([
            'parent_id'=>'required',
            'name'=>'required',
            'type'=>'required'
        ]);
        try {
            Demography::where('id',$demography->id)->update($data);
            return redirect()->route('admin.demography')->with('message','Demography Updated Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function destroy(Demography $demography)
    {
        $demography->delete();
        return redirect()->route('admin.demography')->with('message','Demography Deleted Successfully');
    }
}
