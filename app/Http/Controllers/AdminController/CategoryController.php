<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function CreateCategory(){
        return view('backend.category.allcategory');
    }
    public function StoreCategory(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $var = Category::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('message','Category added Successfully!!');
    }
    public function CategoryList(){
        $getallcategory=Category::orderby('id','desc')->get();
        return view('backend.category.viewcategory', compact('getallcategory'));
    }
    public function changeStatus(Request $request)
    {
        $categories = Category::find($request->categorystatus_id);
        $categories->status = $request->status;
        $categories->save();
        return response()->json(['success'=>'User status change successfully.']);

    }
    public function EditCategory($id){
        $data = Category::find($id);
        return view('backend.category.edit', ['data' => $data]);
    }
    public function UpdateCategory(Request $request, $id){
        $data=Category::find($id);
        $data->name=$request->name;
        $data->save();
        return redirect('view-category');
    }
    public function Delete($id){
        $data=Category::find($id);
        $data->delete();
        return redirect('/admin/view-category');
    }
}

