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

    public function edit($id): \Illuminate\Http\JsonResponse
    {

        $teacher = Teacher::findOrfail($id);

        return response()->json($teacher);

    }

    public function update(Request $request,$id): \Illuminate\Http\JsonResponse
    {


        $data = Teacher::findOrfail($id)->update([
            'name'=> $request->name,
            'title' => $request->title,
            'institute' => $request->institute
        ]);

        return response()->json(['message'=>'Teacher data updated successful']);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        $data = Teacher::findOrfail($id)->delete();

        return response()->json(['message'=>'Teacher deleted successful']);
    }
}
