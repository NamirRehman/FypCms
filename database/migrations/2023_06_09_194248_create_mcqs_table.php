<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcqs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')
            ->on('subjects');

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')
            ->on('teachers');

            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')
            ->on('exams');

            $table->string('chapter');
            $table->enum('type',['multiple', 'boolean']);
            $table->enum('difficulty', ['easy', 'medium', 'hard']);
            $table->string('difficulty_index');
            $table->string('question');
            $table->string('incorrect_options');
            $table->string('correct_option');
            $table->string('correct_option_explanation')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcqs');
    }
};
