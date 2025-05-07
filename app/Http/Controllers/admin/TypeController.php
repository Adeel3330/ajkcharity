<?php
namespace App\Http\Controllers\admin;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\TryCatch;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    public function index(){
        $groups = Type::where('parent_id',null)->paginate(10);
        return view('admin.types.index', compact('groups'));
    }
    public function store(Request $request){
        
        $data = $request->validate([
            "name" => "required",
            "description" => "required"
        ]);
        try {
           Type::create($data);
           return redirect()->route('admin.types')->with('message','Group created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function items(){
        
        $items = Type::whereNotNull('parent_id')->paginate(10);
        return view('admin.types.items', compact('items'));
    }

    public function create(){
        return view('admin.types.create');
       
    }
    public function edit(Type $type){
    //    $data=$request->validate([
    //     "name"=>"required",
    //     "description"=>"required",
    //    ]);
    //    $type->edit($data);
    //    return back()->with('message','types updated successfully');
    return view('admin.types.edit',compact('type'));
    }

    public function destroy(Type $type){
        $type->delete();
        return redirect('/')-with('message','Types Deleted successfully');
    }
    public function update(Type $type){
        $data = $type->validate(
            [
                "name" => "required",
                "description" => "required"
            ]);
            try {
                Type::update($data);
                return redirect()->route('admin.types')->with('message','Types Updated Successfully');
            } catch (\Throwable $th) {
                //throw $th;
            }
    }
}
