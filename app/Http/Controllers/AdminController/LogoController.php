<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    //
    public  function CreateLogo()
    {
        return view('backend.logo.createlogo');
    }
    public function StoreLogo(Request $request){
        $request->validate([
            'logo'=>'required'
        ]);
        $filename = $request->file('logo');
        $file = time() . '-' . 'logo' . '.' . $filename->getClientOriginalExtension();
        $destination = public_path('backend/img/logo/');
        $filename->move($destination, $file);
        $var = Logo::insert([
            'logo' => $file,
            'created_at'=>Carbon::now()
            
        ]);
        return redirect()->back()->with('message', 'Logo added sucessfully!!');
    }
    public function ViewLogo(){
            $getalllogo = Logo::orderby('id', 'desc')->get();
            return view('backend.logo.viewlogo', compact('getalllogo'));
        }
        public function EditLogo($id)
        {
            $data = Logo::find($id);
            return view('backend.logo.editlogo', ['data' => $data]);
        }
        public function UpdateLogo(Request $request, $id)
        {
            $data = Logo::find($id);
            if ($request->file('logo')) {
                $filename = $request->file('logo');
                $file = time() . '-' . 'logo' . '.' . $filename->getClientOriginalExtension();
                $destination = public_path('backend/img/logo/');
                $filename->move($destination, $file);
                $data->logo = $file ?  $data->logo = $file : '';
            }
            $data->save();
            return  redirect('/admin/view-logo');
        }
            public function DeleteLogo($id){
                $data=Logo::find($id);
                $data->delete();
                return redirect('/admin/view-logo');
            }
        }
    

