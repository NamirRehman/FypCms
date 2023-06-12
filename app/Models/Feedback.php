<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;
use App\Models\Student;
class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_id',
        'student_id',
        'feedback',
    ];

    public function result(){
        return $this->belongsTo(Result::class,'result_id');
    }
    
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
