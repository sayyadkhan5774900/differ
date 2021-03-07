<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInstalmentsTable extends Migration
{
    public function up()
    {
        Schema::table('instalments', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_2946162')->references('id')->on('students');
        });
    }
}
