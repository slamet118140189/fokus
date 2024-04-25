<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'location',
        'capacity',
    ];

    public function exams(){
        return $this->belongsToMany(Exam::class)->using(ExamRoom::class);
    }
}
