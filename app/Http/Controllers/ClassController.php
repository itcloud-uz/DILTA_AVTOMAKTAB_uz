<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Http\Resources\SchoolClassResource;
use App\Models\SchoolClass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $classes = SchoolClass::withCount('students')->get();
        return SchoolClassResource::collection($classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassRequest $request
     * @return SchoolClassResource
     */
    public function store(StoreClassRequest $request): SchoolClassResource
    {
        $class = SchoolClass::create($request->validated());
        return new SchoolClassResource($class);
    }

    /**
     * Display the specified resource.
     *
     * @param SchoolClass $schoolClass
     * @return SchoolClassResource
     */
    public function show(SchoolClass $schoolClass): SchoolClassResource
    {
        $schoolClass->load('students');
        return new SchoolClassResource($schoolClass);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassRequest $request
     * @param SchoolClass $schoolClass
     * @return SchoolClassResource
     */
    public function update(UpdateClassRequest $request, SchoolClass $schoolClass): SchoolClassResource
    {
        $schoolClass->update($request->validated());
        return new SchoolClassResource($schoolClass);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SchoolClass $schoolClass
     * @return JsonResponse
     */
    public function destroy(SchoolClass $schoolClass): JsonResponse
    {
        $schoolClass->delete();
        return response()->json([
            'message' => 'Sinf muvaffaqiyatli o\'chirildi.',
        ]);
    }

    /**
     * Custom endpoint: Get all students in a class and their grades (with subjects and teachers).
     *
     * @param SchoolClass $schoolClass
     * @return JsonResponse
     */
    public function studentsGrades(SchoolClass $schoolClass): JsonResponse
    {
        $schoolClass->load(['students.grades.subject', 'students.grades.teacher']);

        $data = [
            'class_id' => $schoolClass->id,
            'class_name' => $schoolClass->name,
            'students' => $schoolClass->students->map(function ($student) {
                return [
                    'student_id' => $student->id,
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'status' => $student->status,
                    'grades' => $student->grades->map(function ($grade) {
                        return [
                            'grade_id' => $grade->id,
                            'score' => $grade->score,
                            'date' => $grade->date,
                            'subject' => $grade->subject ? $grade->subject->name : null,
                            'teacher' => $grade->teacher ? $grade->teacher->name : null,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json([
            'data' => $data,
        ]);
    }
}
