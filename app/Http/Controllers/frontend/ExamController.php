<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function get_exams(){

        $exam = Exam::all();

        return response()->json(['data' =>$exam], 201);
    }
}
