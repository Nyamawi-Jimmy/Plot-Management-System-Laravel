<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public  function show(){
        return view("screens.blog-grid");
    }
}
