<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function CreateVideo()
    {
        return view('backend.video.create');
    }
    public function StoreVideo(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnails_image' => 'required',
            'video_url' => 'required',
            'description' => 'required',
        ]);
        $filename = $request->file('thumbnails_image');
        $file = time() . '-' . 'video' . '.' . $filename->getClientOriginalExtension();
        $destination = public_path('backend/img/video/');
        $filename->move($destination, $file);
        $var = Video::insert([
            'title' => $request->title,
            'thumbnails_image' => $file,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('message', 'Video Added Successfully!!');
    }
    public function ViewVideo()
    {
        $getallvideo = Video::orderby('id', 'desc')->get();
        return view('backend.video.view', compact('getallvideo'));
    }
    public function changeVideoStatus(Request $request)
    {
        $videoes = Video::find($request->videoestatus_id);
        $videoes->status = $request->status;
        $videoes->save();
        return response()->json(['success' => 'User status change successfully.']);
    }
    public function EditVideo($id){
        $data = Video::find($id);
        return view('backend.video.edit', ['data' => $data]);
    }
    public function UpdateVideo(Request $request, $id)
    {
        $data = Video::find($id);
        if ($request->file('thumbnails_image')) {
            $filename = $request->file('image');
            $file = time() . '-' . 'video' . '.' . $filename->getClientOriginalExtension();
            $destination = public_path('backend/img/video/');
            $filename->move($destination, $file);
            $data->thumbnails_image = $file ?  $data->image = $file : '';
        }
        $data->title = $request->title;
        $data->video_url=$request->video_url;
        $data->description = $request->description;
        $data->save();
        return  redirect('/admin/view-video');
    }
    public function DeleteVideo($id){
        $data=video::find($id);
        $data->delete();
        return redirect('/admin/view-video');
    }
}
