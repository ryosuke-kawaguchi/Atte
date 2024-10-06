<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimestampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timestamps', function (Blueprint $table) {
            /*$table->id();
            $table->dateTime('workIn');
            $table->dateTime('workOut')->nullable();
            $table->dateTime('breakIn')->nullable();
            $table->dateTime('breakOut')->nullable();
            $table->float('workTime')->nullable();
            $table->timestamps();*/
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->string('name')->nullable();
            $table->time('workIn')->nullable();
            $table->time('workOut')->nullable();
            $table->time('breakIn')->nullable();
            $table->time('breakOut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timestamps');
    }
}
