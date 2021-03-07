<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('degree_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id', 'degree_id_fk_2946104')->references('id')->on('degrees')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_2946104')->references('id')->on('subjects')->onDelete('cascade');
        });
    }
}
