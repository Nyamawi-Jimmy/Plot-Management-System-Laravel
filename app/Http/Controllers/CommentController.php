<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create and save a new message
        Comment::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent and saved. Thank you!');
    }
}
