<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassesResource;
use App\Http\Resources\ClassShowResource;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Class_model;

use App\Models\Classes;
use App\Models\Lecture;
use App\Models\LecturesPlan;
use App\Models\Student;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use PHPUnit\TextUI\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Class_model::all()->sortBy('id');
        return ClassesResource::collection($classes);
    }


    public function show($id)
    {
        $class = Class_model::with('students')->find($id);
        return new ClassShowResource($class);
    }

    public function getLecturePlan($id)
    {

        $class_plan = Class_model::with('lectures')->find($id);
        return response()->json($class_plan);
    }


    public function storeOrUpdateLecturePlan(Request $request, $id)
    {
        $class = Class_model::find($id);
        $request_data = $request->all();
        $plan = $request_data['plan'];
        if ($class->lectures()->exists()) {
            $class->lectures()->detach();
        }
        $plan = explode(',', $plan);
        $isnert_data = [];
        for ($i = 0; $i < count($plan); $i++) {
            array_push($isnert_data, ['class_id' => $id, 'lecture_id' => $plan[$i], 'order' => $i + 1]);
        }

        LecturesPlan::upsert($isnert_data, ['id']);
        return response()->json($class = Class_model::find($id));

    }


    public function updateLecturePlan(Request $request, $id)
    {
        $class = Class_model::find($id);
        $class->lecturePlan()->updateOrCreate([], $request->all());
        return response()->json($class->lecturePlan);
    }

    public function store(Request $request)
    {
        $class = Class_model::create($request->all());
        return response()->json($class, 201);
    }

    public function update(Request $request, $id)
    {
        $class = Class_model::findOrFail($id);
        $class->update($request->only('name'));
        return response()->json($class);
    }


    public function destroy($id)
    {
        if ($class = Class_model::find($id)) {
            $class->students()->update(['class_id' => null]);
            $class->lectures()->detach();
            $class->class_lecture()->detach();

            $class->delete();
            return response()->json( ['status' => 'success','data' => []])->setStatusCode(200);
        } else {
            return response()->json( ['status' => 'faile','data' => []])->setStatusCode(406);

        }

    }

}
