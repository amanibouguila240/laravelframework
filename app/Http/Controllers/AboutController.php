<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function showAbout($bien){
        return "showAbout $bien";
    }
}
