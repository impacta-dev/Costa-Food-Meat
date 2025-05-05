<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProductContact;

class ProductContactController extends Controller
{
    public function send(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
            'cp' => 'max:255',
            'country' => 'max:255',
            'message' => 'required|max:2048',
            'legal' => 'required|accepted',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = $request->all();
        \Mail::to(config('mail.to'))->send(new ProductContact($data));

        return back()->with('message', 'Gracias por contactar con nosotros. Le responderemos a la mayor brevedad posible.');
    }
}
