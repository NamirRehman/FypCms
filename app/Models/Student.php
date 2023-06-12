<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
          'name',
          'email',
          'password',
          'phone',
          
    ];

    public function result(){
        return $this->HasMany(Result::class,'student_id');
    }
}
