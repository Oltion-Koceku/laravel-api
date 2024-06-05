<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data,
        [
            "name" => "requ"
        ]);

        return response()->json($data);

    }
}
