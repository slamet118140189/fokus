<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamroomSubtest extends Pivot
{
    use HasFactory;

    protected $fillable=[
        'subtest_id',
        'examroom_id',
        'token',
    ];

}
