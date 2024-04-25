<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamRoom extends Pivot
{
    use HasFactory;

    protected $fillable=[
        'exam_id',
        'room_id',
    ];

    public function subtests(){
        return $this->belongsToMany(Subtest::class)->using(ExamroomSubtest::class)->withPivot(['token']);
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }
}
