<?php

namespace App\Http\Controllers;

use App\ImprovementIdea;
use Illuminate\Http\Request;
use App\Mail\ImprovementIdea as ImprovementIdeaMail;

class ImprovementIdeaController extends Controller
{
    public function send(Request $request)
    {
        $validateData = $request->validate([
            'name_and_surname' => 'nullable|string|max:255',
            'department' => 'required|string|max:255',
            'date' => 'required|date',
            'section' => 'required|string|max:255',
            'current_situation_desc' => 'required|string|max:2048',
            'proposed_solution' => 'required|string|max:2048',
            'expected_improvement' => 'required|string|max:2048',
            'legal' => 'required|accepted',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        ImprovementIdea::create($validateData);

        $data = $request->all();

        \Mail::to('test@test.com')->send(new ImprovementIdeaMail($data));

        return back()->with('message', 'Hemos recibido tu idea de mejora correctamente. ¡Gracias!');
    }
}
