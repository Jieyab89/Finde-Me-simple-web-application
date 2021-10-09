<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vipusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vipusers', function (Blueprint $table)
      {
  			$table->id();
  			$table->foreignId('user_id');
  			$table->longtext('vip_status');
  			$table->timestamps();
		  });

      Schema::table('vipusers', function (Blueprint $table)
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
