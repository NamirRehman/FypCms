<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'qualification',
          'status',
          'user_id',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
