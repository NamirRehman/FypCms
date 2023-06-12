<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\TeacherConsultant;

class TeacherConsultationController extends Controller
{
    public function show_list()
    {
        $teacher = TeacherConsultant::with('teacher')->get();
        return view('UserComponent.TeacherComponent.teacher-consultation-list',compact('teacher'));
    }

    public function add_teacher_consultant(){
        $teacher = Teacher::all();
        // dd($teacher);
        return view('UserComponent.TeacherComponent.add-teacher-consultation',compact('teacher'));
    }

    public function store_teacher_consultant(Request $request){

    $teacher_consultant = new TeacherConsultant();
    $teacher_consultant->teacher_id = $request->post('teacher');
    $teacher_consultant->subject_name = $request->post('subject_name');
    $teacher_consultant->status = $request->post('status');
    $teacher_consultant->availability = $request->post('availability');

    $teacher_consultant->save();

    return redirect()->route('teacher-consultant-list');

    }
}
