<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id', 'degree_fk_2946118')->references('id')->on('degrees');
            $table->unsignedBigInteger('batch_id');
            $table->foreign('batch_id', 'batch_fk_2946119')->references('id')->on('batches');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2946143')->references('id')->on('users');
        });
    }
}
