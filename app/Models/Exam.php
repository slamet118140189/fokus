<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'start_date',
        'end_date',
        'number_of_subtest',
    ];

    public function rooms(){
        return $this->belongsToMany(Room::class)->using(ExamRoom::class);
        // return $this->belongsToMany(Room::class, 'rooms', 'exam_id', 'room_id', 'id', 'id', 'exam_rooms');
    }

    public function subtests(){
        return $this->hasMany(Subtest::class);
    }
}
