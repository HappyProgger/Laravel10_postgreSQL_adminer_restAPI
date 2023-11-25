<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\ClassShowResource;
use App\Models\Classes;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Store;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }
//    public function index()
//    {
//        $students = Student::all();
//        //       return response()->json($classes);
//        //       return $classes;
//        return new ClassShowResource::collection($students);
//        }

    public function show($id)
    {
        $student = Student::with('class')->find($id);
        $path_lections_list = explode(",",$student['path_lections']);
        $student["path_lections"] = Lecture::whereIn('id',$path_lections_list)->get();
        $path_lections = Lecture::whereIn('id',$path_lections_list)->get();
        return $student;
//        return Student::find($id)->intersect(Lecture::whereIn('id',$path_lections_list)->get());
//        return response()->json($student,$path_lections);
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
//        return $request->all();
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only(['name', 'classes_id']));
//        return $request->only(['name', 'class_id']);
        return response()->json($student);
    }

    public function destroy($id)
    {
        if($student = Student::findOrFail($id)){
        $student->lectures()->detach();
        $student->delete();
           return [response()->json(null, 204),['status' => 'success' ]] ;
        }else{
            return [response()->json(null, 204),['status' => 'failed' ]] ;
        }

//        $student->lectures()->detach();
//        $student->delete();
//
//        return response()->json(null, 204);
    }
}
