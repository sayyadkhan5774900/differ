<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('body_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
