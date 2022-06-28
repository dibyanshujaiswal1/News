<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    //
    public function mainPage(){
        return view('backend.mainpage');
    }
}
