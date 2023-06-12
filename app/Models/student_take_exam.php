<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Exam;

class student_take_exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    
}
