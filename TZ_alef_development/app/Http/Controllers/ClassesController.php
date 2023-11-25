<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassesResource;
use App\Http\Resources\ClassShowResource;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Classes;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ClassesController extends Controller
{
   public function index()
   {
       $classes = Classes::all();
//       return response()->json($classes);
//       return $classes;
       return ClassesResource::collection($classes);
   }

//    public function index(): JsonResponse
//    {
//        try {
////            $user = $this->service->create();
//            return new ApiSuccessResponse(
//                $user,
//                ['message' => 'User was created successfully'],
//                Response::HTTP_CREATED
//            );
//        } catch (Throwable $exception) {
//            return new ApiErrorResponse(
//                'An error occurred while trying to create the user',
//                $exception
//            );
//        }
//    }






//    public function show($id)
//    {
//        $class = Classes::with('students')->find($id);
//        return response()->json($class);
//    }


    public function show($id)
    {
        $class = Classes::with('students')->find($id);
//       return response()->json($classes);
//       return $classes;
        return new ClassShowResource($class);
//        return $class;
    }

    public function getLecturePlan($id)
    {
        $class_plan_list = explode(",",Classes::find($id)['plan_lections']);
        $class_plan = Lecture::whereIn('id',$class_plan_list)->get();
        //        $lecturePlan = $class->lecturePlan;
//        return response()->json($lecturePlan);
        return response()->json($class_plan);
    }


//    public function show($id)
//    {
//        $student = Student::with('class')->find($id);
//        $path_lections_list = explode(",",$student['path_lections']);
//        $student["path_lections"] = Lecture::whereIn('id',$path_lections_list)->get();
//        $path_lections = Lecture::whereIn('id',$path_lections_list)->get();
//        return $student;
////        return Student::find($id)->intersect(Lecture::whereIn('id',$path_lections_list)->get());
////        return response()->json($student,$path_lections);
//    }





    public function createOrUpdateLecturePlan(Request $request, $id)
    {
        $class = Classes::find($id);
        $class->lecturePlan()->updateOrCreate([], $request->all());
        return response()->json($class->lecturePlan);
    }

    public function store(Request $request)
    {
        $class = Classes::create($request->all());
        return response()->json($class, 201);
    }


//    public function store(Request $request): JsonResponse
//    {
//        try {
//            $user = Classes::$request->all();
//            return new ApiSuccessResponse(
//                $user,
//                ['message' => 'User was created successfully'],
//                Response::HTTP_CREATED
//            );
//        } catch (Throwable $exception) {
//            return new ApiErrorResponse(
//                'An error occurred while trying to create the user',
//                $exception
//            );
//        }
//    }


    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
        $class->update($request->only('name'));
        return response()->json($class);
    }

//    public function destroy($id)
//    {
//        $class = Classes::findOrFail($id);
//        $class->students()->detach();
//        $class->delete();
//        return response()->json(null, 204);
//    }

    public function destroy($id)
    {
        if ($class = Classes::findOrFail($id)) {
            $class->students()->update(['classes_id' => null]);
            $class->path_lectures()->detach();
            $class->delete();
            return [response()->json(null, 204), ['status' => 'success']];
        } else {
            return [response()->json(null, 204), ['status' => 'failed']];
        }
    }

}
