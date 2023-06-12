<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'exam_id',

    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
