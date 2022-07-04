<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function Createpost(){
        $category=\App\Models\Category::get();
        $sub_category=\App\Models\SubCategory::get();
        return view('backend.post.createpost',compact('category','sub_category'));
    }
    Public function StorePost(Request $request){
        $request->validate([
            'category_id'=>'required',
            'post_name'=>'required',
            'sub_title'=>'required',
            'main_image'=>'required',
            'description'=>'required'
        ]);
        $filename = $request->file('main_image');
        $file = time() . '-' . 'post' . '.' . $filename->extension();
        $destination = public_path('backend/img/post/');
        $filename->move($destination, $file);
        $data = [];
        if($request->hasfile('relatives_image'))
         {
            foreach($request->file('relatives_image') as $files)
            {
                $name = rand(1,9999999).'.'.$files->extension();
                $files->move(public_path().'/backend/img/post/relatives_image', $name);  
                $data[] = $name;
            }
         }
        $var = new Post();
           $var->category_id=$request->category_id;
           $var->sub_category_id=$request->sub_category_id;
           $var->post_name=$request->post_name;
           $var->sub_title=$request->sub_title;
           $var->post_tag=$request->post_tag;
           $var->main_image=$file;
           $var->relatives_image=json_encode($data);
           $var->description=$request->description;
           $var->headline=$request->headline;
           $var->mainnews=$request->mainnews;
           $var->is_features=$request->is_features;
           $var->created_at=Carbon::now();
           $var->save();
        return redirect()->back()->with('message','Post added successfully!!');
    }
}
