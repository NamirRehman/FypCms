<?php

namespace App\Http\Controllers\FeedbackController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    
    public function show_feedback(){
        $feedback = Feedback::with('student','result')->get();
        return view('FeedbackComponent.feedback-list',compact('feedback'));
    }
}
