<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public  function  store(Request $request){
        $validateProperties=$request->validate([
            "name"=>"required|string",
            "location"=>"required|string",
            "city"=>"required|string",
            "phone"=>"required|integer",
            "longlat"=>"required|string",
        ]);

        $properties=Properties::create([
            "name"=>$validateProperties["name"],
            "location"=>$validateProperties["location"],
            "city"=>$validateProperties["city"],
            "phone"=>$validateProperties["phone"],
            "longlat"=>$validateProperties["longlat"],
        ]);

        return response()->json(["message"=>"Properties Successfully added"],201);

    }


}
