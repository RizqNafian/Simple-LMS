<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ClassRoom;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::select('teachers.id', 'teachers.teacher_name', 'class_rooms.class_room_name', 'courses.course_name')
            ->join('courses', 'teachers.id', '=', 'courses.teacher_id')
            ->join('class_rooms', 'teachers.id', '=', 'class_rooms.teacher_id')
            ->get();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $classrooms = ClassRoom::all();
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new Teacher();
        $teacher->teacher_name = $request->name;
        $teacher->class_room_id = $request->class_room;
        $teacher->course_id = $request->course;
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id)
            ->select('teachers.id', 'teachers.teacher_name', 'class_rooms.class_room_name', 'courses.course_name')
            ->join('courses', 'teachers.id', '=', 'courses.teacher_id')
            ->join('class_rooms', 'teachers.id', '=', 'class_rooms.teacher_id')
            ->get();
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::all();
        $classrooms = ClassRoom::all();
        $teacher = Teacher::find($id);
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->teacher_name = $request->name;
        $teacher->class_room_id = $request->class_room;
        $teacher->course_id = $request->course;
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher.index');
    }
}
