<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvsTable extends Migration
{

    public function up()
    {
        Schema::create('advs', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('site_title');
            $table->string('link');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('advs');
    }
}
