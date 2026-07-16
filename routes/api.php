<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::apiResource('questions', QuestionController::class);


    Route::post('/logout', [AuthController::class, 'logout']);

    // Custom complex endpoint for a class's students and their grades
    Route::get('/school-classes/{school_class}/students-grades', [ClassController::class, 'studentsGrades']);

    // Resource routes
    Route::apiResource('school-classes', ClassController::class);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('subjects', SubjectController::class);
    Route::apiResource('grades', GradeController::class);
});
