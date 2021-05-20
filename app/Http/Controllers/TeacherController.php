<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {

        $data = Teacher::orderBy('id','DESC')->get();
        return response()->json($data);
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {

        $data = new Teacher();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->institute = $request->institute;
        $data->save();

        return response()->json(['message'=>'Teacher data saved successful']);
    }
}
