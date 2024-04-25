<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable=[
        'registration_number',
        'school_origin',
        'image_path',
    ];

    public function examroom(){
        return $this->belongsTo(ExamRoom::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
