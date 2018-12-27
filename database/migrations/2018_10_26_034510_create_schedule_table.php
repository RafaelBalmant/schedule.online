<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time');
            $table->string('date');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('client_id');
            $table->foreign('service_id')
                ->references('id')
                ->on('services');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('schedule');
    }
}
