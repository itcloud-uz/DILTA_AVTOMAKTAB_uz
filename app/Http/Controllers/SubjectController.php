<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $subjects = Subject::all();
        return SubjectResource::collection($subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubjectRequest $request
     * @return SubjectResource
     */
    public function store(StoreSubjectRequest $request): SubjectResource
    {
        $subject = Subject::create($request->validated());
        return new SubjectResource($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return SubjectResource
     */
    public function show(Subject $subject): SubjectResource
    {
        return new SubjectResource($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubjectRequest $request
     * @param Subject $subject
     * @return SubjectResource
     */
    public function update(UpdateSubjectRequest $request, Subject $subject): SubjectResource
    {
        $subject->update($request->validated());
        return new SubjectResource($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return JsonResponse
     */
    public function destroy(Subject $subject): JsonResponse
    {
        $subject->delete();
        return response()->json([
            'message' => 'Fan muvaffaqiyatli o\'chirildi.',
        ]);
    }
}
