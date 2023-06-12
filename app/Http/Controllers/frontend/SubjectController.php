<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\mcqs;
use App\Models\SubjectExam;
class SubjectController extends Controller
{
    public function get_subject(Request $request){

        $subject = SubjectExam::where('exam_id',$request->post('exam_id'))->with('subject')->with('exam')->get();
        return response()->json(['category' =>$subject], 200);
    }

    public function get_mcqs(Request $request){

        $mcqs = mcqs::where('subject_id',$request->get('category'))->where('difficulty',$request->get('difficulty'))
        ->with('subject')->limit($request->get('amount'))
        ->get();

        // $result = [];
        // foreach($mcqs as $row){
         
        //     $result = [

        //         'category' => $row->subject->name,
        //         'type' => $row->type,
        //         'difficulty' => $row->difficulty,
        //         'question' => $row->question,
        //         'correct_answer' => $row->correct_option,
        //         'incorrect_answers' => $row->incorrect_options

        //     ];

        // }

        // return response()->json(['category' =>$mcqs], 200);

        $results = $mcqs->map(function ($mcq) {
            return [
                'category' => $mcq->subject->name,
                'type' => $mcq->type,
                'difficulty' => $mcq->difficulty,
                'question' => $mcq->question,
                'correct_answer' => $mcq->correct_option,
                'incorrect_answers' => explode(',', $mcq->incorrect_options),
            ];
        });
        return response()->json(['category' =>$results], 200);
    }
}
