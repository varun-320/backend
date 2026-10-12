<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'course' => 'required|string|max:255',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Student registered successfully!',
            'student' => $student,
        ], 201);
    }
}