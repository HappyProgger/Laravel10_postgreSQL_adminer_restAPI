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
        $students = Student::all()->sortBy('id');
        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::with('class', 'lectures')->find($id);
        return response()->json($student);

    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only(['name', 'class_id']));
        return response()->json($student);
    }

    public function destroy($id)
    {
        if ($student = Student::find($id)) {
            $student->lectures()->detach();
            $student->delete();
            return response()->json( ['status' => 'success','data' => []])->setStatusCode(200);

        } else {
            return response()->json( ['status' => 'faile','data' => []])->setStatusCode(406);

        }

    }
}
