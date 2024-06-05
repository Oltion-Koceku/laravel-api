<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technologie;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ApiController extends Controller
{
    public function index(){

        $projects = Project::with('type', 'technologie')->paginate(20);

        return response()->json($projects);

    }

    public function getType(){

        $typs = Type::all();
        return response()->json($typs);

    }

    public function getTechnologie(){

        $technologies = Technologie::all();
        return response()->json($technologies);

    }

    public function getDetailbySlug($slug){


        $detail = Project::where('slug', $slug)->with('technologie', 'type')->first();

        if ($detail) {
            $success = true;
            if ($detail->img) {
                // $detail->img = asset('storage/' .  $detail->img );
                $detail->img = Storage::url($detail->img);
            }else{
                $detail->img = Storage::url('/uploads/no-img.jpg');
            }
        }else{
            $success = false;
        }



        return response()->json(compact('success', 'detail'));


    }
}
