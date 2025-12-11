<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'message' => 'required|min:5',
        ]);

        return back()->with('success', 'Mensaje enviado correctamente.');
    }
}
