<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Result;
use App\Models\User;
use App\Models\student_take_exam;
class StudentController extends Controller
{
    public function register_student(Request $request){

        $student = new Student();
        $student->email = $request->post('email');
        $student->password = $request->post('password');
        $student->save();
        $student = Student::latest()->first();
        return response()->json(['message' => 'Registration successful','data' =>$student], 201);
    }


    public function signin_student(Request $request){

        $student = Student::where('email',$request->post('email'))->where('password',$request->post('password'))->first();

        if($student){
            return response()->json(['message' => 'Sign In successful','data' => $student], 201);
        }else{
            return response()->jason(['message' => 'Sign In Failed'], 400);
        }
    }

    public function create_profile(Request $request){

        $student = Student::where('id',$request->post('student_id'))->first();

        $student->name = $request->post('first_name').' '.$request->post('last_name');
        $student->phone = $request->post('phone');

        $student->save();
        return response()->json(['message' => 'Profile Creation successful','data' =>$student], 201);

    }

    public function get_account(Request $request){

        $student = Student::where('id',$request->post('student_id'))->with('result')->get();

        return response()->json(['data' =>$student], 201);
    }

    public function change_password(Request $request){

        $student = Student::where('id',$request->post('student_id'))->first();

        $student->password = $request->post('confirm_password');
        $student->save();

        return response()->json(['data' =>$student], 201);
    }

    public function store_student_exam(Request $request){
  
        $student = new student_take_exam();

        $student->student_id = $request->post('student_id');
        $student->exam_id = $request->post('exam_id');

        $student->save();

        return response()->json(['message'=>'Registration Successfull'],201);
        
    }

    public function store_student_result(Request $request){

        $result = new Result();

        $result->student_id = $request->post('student_id');
        $result->total_marks = $request->post('total_marks');
        $result->obtained_marks = $request->post('obtained_marks');
        $result->exam_name = $request->post('exam_name');
        $result->subject_name = $request->post('subject_name');
        $result->pridection_index = $request->post('prediction_index');
        $result->percentage = ($result->obtained_marks/$result->total_marks)*100;

        $result->save();

        return response()->json(['message'=> 'Result Stored Successfully'],201);
    }

    public function show_result(Request $request){
        
        $result = Result::where('student_id',$request->post('student_id'))->get();

        return response()->json(['result'=>$result],201);
    }
}
