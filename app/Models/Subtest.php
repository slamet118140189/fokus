<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtest extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'duration',
        'number_of_question',
        'exam_id',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function examrooms(){
        return $this->belongsToMany(ExamRoom::class)->using(ExamroomSubtest::class)->withPivot(
            [
                'token'
            ]);
    }

    public function question(){
        return $this->hasMany(Question::class);
    }
}
