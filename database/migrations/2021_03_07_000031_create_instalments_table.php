<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalmentsTable extends Migration
{
    public function up()
    {
        Schema::create('instalments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('amount', 15, 2);
            $table->string('payment_mehtod')->nullable();
            $table->string('payment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
