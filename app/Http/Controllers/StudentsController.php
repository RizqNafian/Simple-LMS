<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Course;
use App\Models\ClassRoom;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::select('teachers.id', 'teachers.teacher_name', 'class_rooms.class_room_name', 'courses.course_name')
            ->join('courses', 'teachers.id', '=', 'courses.teacher_id')
            ->join('class_rooms', 'teachers.id', '=', 'class_rooms.teacher_id')
            ->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ClassRoom::all();
        $courses = Course::all();
        return view('students.create', compact('classes', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Students();
        $student->student_name = $request->name;
        $student->class_room_id = $request->class_room;
        $student->course_id = $request->course;
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::find($id)
            ->select('teachers.id', 'teachers.teacher_name', 'class_rooms.class_room_name', 'courses.course_name')
            ->join('courses', 'teachers.id', '=', 'courses.teacher_id')
            ->join('class_rooms', 'teachers.id', '=', 'class_rooms.teacher_id')
            ->get();
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes = ClassRoom::all();
        $courses = Course::all();
        $student = Students::find($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Students::find($id);
        $student->student_name = $request->name;
        $student->class_room_id = $request->class_room;
        $student->course_id = $request->course;
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
