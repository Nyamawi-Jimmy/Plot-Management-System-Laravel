<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlocksController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'block_id' => 'required|exists:properties,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $block = new Blocks();
        $block->name = $request->input('name');
        $block->block_id = $request->input('block_id'); // Assuming the input name is "block_id"
        $block->save();

        $property = Properties::findOrFail($block->block_id);

        return response()->json([
            'message' => 'Block created successfully',
            'name' => $property->name,
            'block_id' => $property->id
        ]);
    }

}
