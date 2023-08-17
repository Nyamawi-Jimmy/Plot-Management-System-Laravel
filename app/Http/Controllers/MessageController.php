<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required|min:8',
            'message' => 'required',
        ]);

        // Create and save a new message
        Message::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent and saved. Thank you!');
    }
}
