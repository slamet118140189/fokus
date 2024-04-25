<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable=[
        'question_id',
        'participant_id',
        'multiplechoice_id',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function multiplechoice(){
        return $this->belongsTo(Multiplechoice::class);
    }

    public function participant(){
        return $this->belongsTo(Participant::class);
    }
}
