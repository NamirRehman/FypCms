<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class TeacherConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
          'teacher_id',
          'subject_name',
          'status',
          'availability',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
