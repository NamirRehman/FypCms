<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Teacher;

class mcqs extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'exam_id',
        'chapter',
        'type',
        'difficulty',
        'difficulty_index',
        'question',
        'incorrect_options',
        'correct_option',
        'correct_option_explanation',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

}
