<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function procesar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:30'],
            'email' => (Auth::user() === null) ? ['required', 'email'] : ['nullable'],
            'comentarios' => ['required', 'string', 'min:10', 'max:250'],
        ]);
        
        // He tenido que mirar lo del email, so sabía hacerlo

        try {
            Mail::to('support@example.com')->send(new ContactoMailable($request->nombre, $request->email ?? Auth::user()->email, $request->comentarios));
            return redirect()->route('inicio')->with('mensaje', 'Se envió el mensaje');
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
