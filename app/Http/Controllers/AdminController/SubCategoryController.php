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
        if($request->category_id){
        $data->category_id=$request->category_id;
    }
    else{
        $data->category_id=1;
    }
        $data->name=$request->name;
        $data->save();
        return redirect('admin/view-subcategory');
    }
    public function Delete($id){
        $data=SubCategory::find($id);
        $data->delete();
        return redirect('/admin/view-subcategory');
    }
    public function changeSubCategoryStatus(Request $request)
    {
        $subcategories = SubCategory::find($request->subcategorystatus_id);
        $subcategories->status = $request->status;
        $subcategories->save();
        return response()->json(['success'=>'User status change successfully.']);

    }
}
