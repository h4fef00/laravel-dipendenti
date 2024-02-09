<?php

namespace App\Http\Controllers;

use App\Models\Dipendente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DipendenteController extends Controller
{
    public function list()
    {
        $dipendenti = Dipendente::all(); //tutti i dip
        return view('dipendenti.index.list', compact('dipendenti'));
    }

    public function create()
    {
        return view("dipendenti.create.create");
    }

    public function store(Request $request)
    {

        $rules  = [
            'name' => 'required|regex:/^[a-zA-Z]{1}[a-zA-Z\é\è\ò\à\ù\ì\'\s]{2,29}$/',
            'surname' => 'required|regex:/^[a-zA-Z]{1}[a-zA-Z\é\è\ò\à\ù\ì\'\s]{2,29}$/',
            'email' =>  'required|regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/'
        ];

        $messages = [
            'name.required' => 'Inserire un titolo',
            'surname.required' => 'Inserire una descrizione',
            'email.required' => 'Inserire il checkbox',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = $validator->errors();
            return response()->json([
                'response' => false,
                'error' => $error
            ]);
        };

        $dipendente = Dipendente::find($request->id);

        if (!$dipendente) {
            // Se non trovi il dipendente, crea un nuovo oggetto
            $dipendente = new Dipendente();
        }

        $dipendente->name = $request->name;
        $dipendente->surname = $request->surname;
        $dipendente->email = $request->email;
        $dipendente->save();
        return response()->json([
            'response' => true
        ]);
    }

    public function edit($id)
    {
        $error_server = false;
        $dipendente = '';
        $dipendente = Dipendente::where(['id' => $id])->first();
        if ($dipendente == '' || $dipendente == null) {
            $error_server = true;
        }
        return view("dipendenti.create.create", compact("dipendente"));
    }

    // public function delete($id)
    // {
    //     $dipendente = Dipendente::where(['id' => $id])->first();
    //     if ($dipendente == '' || $dipendente == null) {
    //         $error_server = true;
    //     }
    //     $dipendente->delete();
    //     return view("dipendenti.create.create", compact("dipendente"));
    // }

    public function delete($id)
    {
        $dipendente = Dipendente::find($id);

        if (!$dipendente) {
            return response()->json(['success' => false, 'message' => 'Dipendente non trovato.'], 404);
        }

        $dipendente->delete();

        return response()->json(['success' => true, 'message' => 'Dipendente eliminato con successo.']);
    }
}
