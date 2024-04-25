<?php

use App\Models\ExamRoom;
use App\Models\Subtest;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('examroom_subtest', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subtest::class)->constrained()->cascadeOnDelete();
            $table->foreignId('examroom_id')->references('id')->on('exam_rooms')->constrained()->cascadeOnDelete();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examroom_subtest');
    }
};
