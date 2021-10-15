<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table)
      {
  			$table->id();
  			$table->string('title');
  			$table->foreignId('user_id');
  			$table->longtext('content');
            $table->string('photo');
  			$table->timestamps();
		  });

      Schema::table('posts', function (Blueprint $table)
      {
			  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		  });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
