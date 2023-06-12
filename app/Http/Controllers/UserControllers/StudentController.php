<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function show(){
        $student = Student::all();
        return view('UserComponent.StudentComponent.student-list',compact('student'));
    }

}
