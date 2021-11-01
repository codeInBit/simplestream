<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index();
            $table->foreignId('channel_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('programme_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->time('start_time', 0);
            $table->time('end_time', 0);
            $table->string('timezone');
            $table->softDeletes();
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
        Schema::dropIfExists('timetables');
    }
}
