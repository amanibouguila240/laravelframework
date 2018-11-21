<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function showWellcome(){
        return view('welcome');
    }
    public function showview(){
        return view('well');
    }
    
}
