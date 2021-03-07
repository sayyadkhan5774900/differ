<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeTypesTable extends Migration
{
    public function up()
    {
        Schema::create('fee_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('fee', 15, 2)->unique();
            $table->string('type');
            $table->integer('no_of_months')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
