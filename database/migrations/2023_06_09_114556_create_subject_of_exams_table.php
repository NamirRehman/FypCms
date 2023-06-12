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
        Schema::create('subject_of_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')
            ->on('subjects')
            ->onDelete('cascade');

            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')
            ->on('exams')
            ->onDelete('cascade');
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
        Schema::dropIfExists('subject_of_exams');
    }
};
