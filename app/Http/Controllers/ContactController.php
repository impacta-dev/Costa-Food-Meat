<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'subject' => 'required|min:9|max:255',
            'message' => 'required|max:2048',
            'legal' => 'required|accepted',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = $request->all();
        \Mail::to(config('mail.to'))->send(new Contact($data));

        return back()->with('message', 'Gracias por contactar con nosotros. Le responderemos a la mayor brevedad posible.');
    }
}
