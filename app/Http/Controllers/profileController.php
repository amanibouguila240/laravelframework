<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    //
    public function showProfile($thamso1){
        return view('profile')->with('tham1so',$thamso1);
    }
}
