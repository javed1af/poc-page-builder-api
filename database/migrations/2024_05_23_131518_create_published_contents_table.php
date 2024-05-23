<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishedContentsTable extends Migration
{
    public function up()
    {
        Schema::create('published_contents', function (Blueprint $table) {
            $table->id();
            $table->json('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('published_contents');
    }
}
