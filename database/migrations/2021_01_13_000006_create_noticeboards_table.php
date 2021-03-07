<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeboardsTable extends Migration
{
    public function up()
    {
        Schema::create('noticeboards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link_to');
            $table->string('url')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
