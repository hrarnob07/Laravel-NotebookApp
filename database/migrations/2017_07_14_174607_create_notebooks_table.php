<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksTable extends Migration
{
   
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
            $table->string('name');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('notebooks');
    }
}
