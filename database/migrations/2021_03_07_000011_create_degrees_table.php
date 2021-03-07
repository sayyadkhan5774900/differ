<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('type');
            $table->decimal('fee', 15, 2)->nullable();
            $table->string('fee_type');
            $table->integer('duration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
