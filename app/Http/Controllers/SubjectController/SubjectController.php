<?php

namespace App\Http\Controllers\SubjectController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\Subject_of_Exam;

class SubjectController extends Controller
{
    public function show(){

        $subject = Subject::all();
        return view('SubjectComponent.subject-list',compact('subject'));
    }

    public function add_subject(){
        return view('SubjectComponent.add-subject');
    }

    public function store_subject(Request $request){

        $subject = new Subject();
        $subject->name = $request->post('subject_name');
        $subject->description = $request->post('subject_description');
        $subject->save();
        return redirect()->route('subject-list');

    }

    public function add_subject_exam($id){

        $exam = Exam::all();
        $subject = Subject::where('id',$id)->get();
        return view('SubjectComponent.add-subject-exam',compact('exam','subject'));
    }

    public function store_subject_exam(Request $request){

        $subject_of_exam = new SubjectExam();
        $subject_of_exam->subject_id = $request->post('subject_name');
        $subject_of_exam->exam_id = $request->post('subject_exam');
        $subject_of_exam->save();
        return redirect()->route('subject-list');
    }
}
