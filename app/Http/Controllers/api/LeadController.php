<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FormEmail;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                "name" => "required|min:3|max:50",
                "email" => "required|email",
                "message" => "required|min:10",
            ],
            [
                "name.required" => "Il nome è Obbligatiorio",
                "name.min" => "Il nome deve contenere almeno :min caratteri",
                "name.max" => "Il nome non può avere più di :max caratteri",

                "email.required" => "L'email è obbligatorio",
                "email.email" => "E' richiesta una mail Valida",

                "message.required" => "Il messaggio è obbligatorio",
                "message.min" => "Il messaggio deve contenere almeno :min caratteri",
            ]
        );

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }


        $new_lead = new FormEmail;

        $new_lead->fill($data);
        $new_lead->save();


        $success = true;


        return response()->json(compact('success'));


    }
}
