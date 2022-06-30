<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AddSubCategory(){
        $category=\App\Models\Category::get();
        return view('backend.subcategory.createsubcategory',compact('category'));
    }
    public function StoreSubCategory(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $var = SubCategory::insert([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'created_at'=>Carbon::now()
        ]);
        return redirect('view-subcategory')->with('message','Sub Category added Successfully!!');
    }
    public function SubCategoryList(){
        $getallsubcategory=SubCategory::with('category')->orderby('id','desc')->get();
        return view('backend.subcategory.viewsubcategory', compact('getallsubcategory'));
    }
    public function EditSubCategory($id){
        $data = SubCategory::find($id);
        $editcategory=\App\Models\Category::get();

        return view('backend.subcategory.editsubcategory',compact('data','editcategory'));
    }
    public function UpdateSubCategory(Request $request, $id){
        $data=SubCategory::find($id);
        $data->name=$request->name;
        $data->category_id=$request->category_id;
        $data->save();
        return redirect('view-subcategory');
    }
    public function Delete($id){
        $data=SubCategory::find($id);
        $data->delete();
        return redirect('view-subcategory');
    }
    public function changeUserStatus(Request $request)
    {
        $subcategory = SubCategory::find($request->subcategory_id);
        $subcategory->status = $request->status;
        $subcategory->save();
  
        return response()->json(['success'=>'subcategory status change successfully.']);
    }
}
