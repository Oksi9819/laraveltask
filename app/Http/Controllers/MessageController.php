<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function showForm()
    {
        $messages = Message::all();
        return view('form', ['messages' => $messages]);
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Message::create($validatedData);

        return redirect('/');
    }
}

