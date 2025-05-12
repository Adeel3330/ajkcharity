<?php

namespace App\Http\Controllers\admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\TryCatch;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $search=$request->input('search');
        $services=Type::whereNotNull('parent_id')->filter(['search'=> $search])->get();

        $groups = Type::where('parent_id', null)->paginate(10); 
        return view('admin.types.index', compact('groups','services'));
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            "name" => "required",
            "description" => "required"
        ]);
        try {
            Type::create($data);
            return redirect()->route('admin.types')->with('message', 'Group Type created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function items(Request $request)
    {

        $items = Type::with('parent')->whereNotNull('parent_id')->orderBy('id','DESC')->paginate(10);
        return view('admin.types.items', compact('items'));
    }

    public function create()
    {
        return view('admin.types.create');
    }
    public function edit(Type $type)
    {
        //    $data=$request->validate([
        //     "name"=>"required",
        //     "description"=>"required",
        //    ]);
        //    $type->edit($data);
        //    return back()->with('message','types updated successfully');
        return view('admin.types.edit', compact('type'));
    }


    public function update(Request $request, Type $type)
    {
        //    dd($type);
        $data = $request->validate(
            [
                "name" => "required",
                "description" => 'nullable'
            ]
        );
        try {
            Type::where('id', $type->id)->update($data);
            return redirect()->route('admin.types')->with('message', 'Group Types Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'updated failed');
        }
    }
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types')->with('message', 'Group Type Deleted successfully');
    }

    //DropDownItem
    public function ItemCreate()
    {
        $groups = Type::where('parent_id',null)->get();
        return view('admin.types.itemcreate', compact('groups'));
    }

    public function ItemStore(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            "parent_id"=>"required|integer",
            "name" => "required|string",
            "description" => 'nullable'
        ]);

        try {
            Type::create($data);
            return redirect()->route('admin.items')->with('message', 'New Item created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function ItemEdit(Type $type)
    {
        $groups = Type::where('parent_id', null)->get();
        // dd($type);
        return view('admin.types.itemedit', compact('type','groups'));
    }

    public function ItemUpdate(Request $request, Type $type){
        $data=$request->validate([
            "parent_id"=>"required",
            "name"=>"required",
            "description"=>"nullable"
             ]);
            //  dd($type);
        try {
            $type->update($data);
            return redirect()->route('admin.items')->with('message', 'Items are updated successfully');
        } 
        catch (\Throwable $th) {
            return back()->with('error','ItemUpdated failed');
            }
    }

    public function ItemDestroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.items')->with('message','Item Deleted Successfully');
    }
}
