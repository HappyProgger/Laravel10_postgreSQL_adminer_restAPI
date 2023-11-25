<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureStoreRequest;
use App\Http\Requests\LectureUpdateRequest;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::all();
        return response()->json($lectures);
    }

//    public function show($id)
//    {
//        $lecture = Lecture::find($id);
//        $students_path_lection = Student::whereIn('path_lections','1,2');
////        return response()->json($lecture);
//        return $students_path_lection;
//    }

    public function show($id)
    {
        $lecture = Lecture::with('path_classes','path_students' )->find($id);
//        $students_path_lection = Student::whereIn('path_lections','1,2');
//        return response()->json($lecture);
        return $lecture;
    }

    public function store(LectureStoreRequest $request)
    {
        $lecture = Lecture::create($request->all());
        return response()->json($lecture, 201);
    }

    public function update(LectureUpdateRequest $request, $id)
    {
//        $lecture = Lecture::findOrFail($id);
//        $lecture->update($request->all());
//        return response()->json($lecture);


        $lecture = Lecture::findOrFail($id);
        $lecture->update($request->only('description', 'topic'));
//        return $request->only(['name', 'class_id']);
        return response()->json($lecture);
    }



    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->path_classes()->detach();
//        $lecture->students()->detach();
        $lecture->delete();
        return response()->json(null, 204);
    }
}
