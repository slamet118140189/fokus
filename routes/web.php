<?php

use App\Http\Controllers\Admin\Exam\QuestionController as ExamQuestionController;
use App\Http\Controllers\Admin\Exam\SubtestController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('exam', ExamController::class);

Route::resource('question', QuestionController::class);
Route::resource('participant', ParticipantController::class);

Route::prefix('exam/{exam}')->as('exam.')->group(function(){
    Route::resource('subtest', SubtestController::class);
    Route::prefix('subtest/{subtest}')->as('subtest.')->group(function(){
        Route::resource('question', ExamQuestionController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
