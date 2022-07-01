<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function CreateBanner(){
        return view('backend.banner.createbanner');
    }
    public function StoreBanner(Request $request){
        $request->validate([
            'banner_heading'=>'required',
            'banner_image'=>'required',
            'banner_description'=>'required'
        ]);
        $filename = $request->file('banner_image');
        $file = time() . '-' . 'banner' . '.' . $filename->getClientOriginalExtension();
        $destination = public_path('backend/img/banner/');
        $filename->move($destination, $file);
        $var = Banner::insert([
            'banner_heading'=>$request->banner_heading,
            'banner_image' => $file,
            'banner_description'=>$request->banner_description,
            'created_at'=>Carbon::now()
            
        ]);
        return redirect()->back()->with('message', 'Banner added sucessfully!!');
    }
    public function ViewBanner(){
        $getallbanner = Banner::orderby('id', 'desc')->get();
        return view('backend.banner.viewbanner', compact('getallbanner'));
    }
    public function EditBanner($id)
    {
        $data = Banner::find($id);
        return view('backend.banner.editbanner', ['data' => $data]);
    }
    public function UpdateBanner(Request $request, $id)
    {
        $data = Banner::find($id);
        if ($request->file('banner_image')) {
            $filename = $request->file('banner_image');
            $file = time() . '-' . 'banner' . '.' . $filename->getClientOriginalExtension();
            $destination = public_path('backend/img/banner/');
            $filename->move($destination, $file);
            $data->banner_image = $file ?  $data->banner_image = $file : '';
        }
        $data->banner_heading = $request->banner_heading;
        $data->banner_description = $request->banner_description;
        $data->save();
        return  redirect('/admin/view-banner');
    }
    public function DeleteBanner($id){
        $data=Banner::find($id);
        $data->delete();
        return redirect('/admin/view-banner');
    }
}
