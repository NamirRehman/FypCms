<?php

namespace App\Http\Controllers\ResultController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    public function show_result()
    {
        $result = Result::with('student')->get();
        return view('ResultComponent.result-list',compact('result'));
    }
}
