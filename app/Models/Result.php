<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_marks',
        'obtained_marks',
        'percentage',
        'exam_name',
        'subject_name',
        'prediction_index'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

}
