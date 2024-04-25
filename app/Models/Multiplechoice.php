<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiplechoice extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'image_path',
        'is_true',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
