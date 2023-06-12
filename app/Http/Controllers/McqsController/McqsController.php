<?php

namespace App\Http\Controllers\McqsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mcqs;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Subject;

class McqsController extends Controller
{
    public function show_mcqs(){

        $mcqs = mcqs::with('exam','subject','teacher')->get();
        // dd($mcqs[0]['teacher']->user->name);
        return view('McqsComponent.mcqs-list',compact('mcqs'));
    }

    public function add_mcqs(){

        $teacher = Teacher::all();
        $subject = Subject::all();
        $exam = Exam::all();

        return view('McqsComponent.add-mcqs',compact('teacher','subject','exam'));
    }

    public function store_mcqs(Request $request){

        $mcqs = new mcqs();

        $mcqs->teacher_id = $request->post('teacher');
        $mcqs->subject_id = $request->post('subject');
        $mcqs->exam_id = $request->post('exam');
        $mcqs->chapter = $request->post('chapter');
        $mcqs->type = $request->post('type');
        $mcqs->difficulty = $request->post('difficulty');
        $mcqs->difficulty_index = $request->post('difficulty_index');
        $mcqs->question = $request->post('question');
        $mcqs->incorrect_options = $request->post('incorrect_options');
        $mcqs->correct_option = $request->post('correct_option');
        $mcqs->correct_option_explanation = $request->post('correct_option_explanation');
       
        $mcqs->save();

        return redirect()->route('show-mcqs');
    }
}
