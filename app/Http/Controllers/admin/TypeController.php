<?php

namespace App\Http\Controllers\admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    public function index(){
        $groups = Type::where('parent_id',null)->paginate(10);
        return view('admin.types.index', compact('groups'));
    }
    public function items(){
        
        $items = Type::whereNotNull('parent_id')->paginate(10);
        return view('admin.types.items', compact('items'));
    }
    public function create(){
        return view('admin.types.create', compact('create'));
    }
    public function update(Request $request, Type $type){
       $formfields=$request->validate([
        "name"=>"required",
        "description"=>"required",
        "status"=>"required"
       ]);
       $type->update($formfields);
       return back()->with('message','types updated successfully');
    }
    public function destroy(Type $type){
        $type->delete();
        return redirect('/')-with('message','Types Deleted successfully');
    }
}
