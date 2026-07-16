<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Resources\GradeResource;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $grades = Grade::with(['student', 'subject', 'teacher'])->paginate(30);
        return GradeResource::collection($grades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGradeRequest $request
     * @return GradeResource
     */
    public function store(StoreGradeRequest $request): GradeResource
    {
        $data = $request->validated();
        if (empty($data['teacher_id'])) {
            $data['teacher_id'] = auth()->id();
        }

        $grade = Grade::create($data);
        return new GradeResource($grade->load(['student', 'subject', 'teacher']));
    }

    /**
     * Display the specified resource.
     *
     * @param Grade $grade
     * @return GradeResource
     */
    public function show(Grade $grade): GradeResource
    {
        $grade->load(['student', 'subject', 'teacher']);
        return new GradeResource($grade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGradeRequest $request
     * @param Grade $grade
     * @return GradeResource
     */
    public function update(UpdateGradeRequest $request, Grade $grade): GradeResource
    {
        $grade->update($request->validated());
        return new GradeResource($grade->load(['student', 'subject', 'teacher']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Grade $grade
     * @return JsonResponse
     */
    public function destroy(Grade $grade): JsonResponse
    {
        $grade->delete();
        return response()->json([
            'message' => 'Baho muvaffaqiyatli o\'chirildi.',
        ]);
    }
}
