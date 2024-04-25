<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'image_path',
    ];

    public function subtests(){
        return $this->belongsTo(Subtest::class);
    }

    public function multiplechoices(){
        return $this->hasMany(Multiplechoice::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
