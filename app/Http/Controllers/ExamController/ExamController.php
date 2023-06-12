<?php

namespace App\Http\Controllers\ExamController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\student_take_exam;
use App\Models\Result;
use App\Models\ExamInstructions;

class ExamController extends Controller
{
    public function show(){

        $exam = Exam::all();

        return view('ExamComponent.exam-list',compact('exam'));

    }

    public function add_exam(){
        return view('ExamComponent.add-exam');
    }

    public function store_exam(Request $request){
        $exam = new Exam();
        $exam->name = $request->post('exam_name');
        $exam->date = $request->post('exam_date');
        $exam->save();

        return redirect()->route('exam-list');

    }

    public function show_student_exam($id){

        $student_exam = student_take_exam::where('student_id',$id)->with('student','exam')->get();
        // dd($student_exam[0]['student']->name);
        return view('UserComponent.StudentComponent.student-exam-list',compact('student_exam'));
    }

    public function show_results($id){

        $result = Result::where('student_id',$id)->with('student')->get();
        return view('UserComponent.StudentComponent.student-exam-result-list',compact('result'));
    }

    public function show_instructions(){

        $exams_instructions = ExamInstructions::with('exam')->get();
        // dd($exams_instructions);
        return view('ExamComponent.exam-instructions',compact('exams_instructions'));
    }

    public function add_instructions(){
        $exam = Exam::all();
        return view('ExamComponent.add-exam-instructions',compact('exam'));
        
    }

    public function store_instructions(Request $request){

        $exams_instructions = new ExamInstructions();

        $exams_instructions->exam_id = $request->post('exam');
        $exams_instructions->instructions = $request->post('exam_instruction');
        $exams_instructions->time = $request->post('exam_time');

        $exams_instructions->save();

        return redirect()->route('exam-instruction');
    }
    
}
