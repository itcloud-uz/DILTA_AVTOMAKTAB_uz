<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $students = Student::with('schoolClass')->paginate(20);
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentRequest $request
     * @return StudentResource
     */
    public function store(StoreStudentRequest $request): StudentResource
    {
        $student = Student::create($request->validated());
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return StudentResource
     */
    public function show(Student $student): StudentResource
    {
        $student->load(['schoolClass', 'grades.subject', 'grades.teacher']);
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return StudentResource
     */
    public function update(UpdateStudentRequest $request, Student $student): StudentResource
    {
        $student->update($request->validated());
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return JsonResponse
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return response()->json([
            'message' => 'O\'quvchi muvaffaqiyatli o\'chirildi.',
        ]);
    }
}
