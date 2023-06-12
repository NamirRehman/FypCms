<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function show(){
        $teacher = Teacher::with('User')->get();
        return view('UserComponent.TeacherComponent.teacher-list',compact('teacher'));
    }

    public function add_teacher(){
        $user = User::all();
        return view('UserComponent.TeacherComponent.add-teacher',compact('user'));
    }

    public function store_teacher(Request $request){

        $teacher = new Teacher();
        $teacher->user_id = $request->post('user_id');
        $teacher->qualification = $request->post('qualification');
        $teacher->status = $request->post('status');
        $teacher->save();

        return redirect()->route('teacher-list');
    }
}
