<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamInstructions extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'instructions',
        'time',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

}
