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
        $lectures = Lecture::all()->sortBy('id');
        return response()->json($lectures);
    }


    public function show($id)
    {
        $lecture = Lecture::with('students','classes_path_lection')->find($id);
        return $lecture;
    }

    public function store(LectureStoreRequest $request)
    {
        $lecture = Lecture::create($request->all());
        return $request->all();
    }

    public function update(LectureUpdateRequest $request, $id)
    {

        $lecture = Lecture::findOrFail($id);
        $lecture->update($request->only('description', 'theme'));
        return response()->json($lecture);
    }


    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->classes_path_lection()->detach();
        $lecture->students()->detach();
        $lecture->delete();
        return response()->json(null, 204);
    }
}
