<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('event_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->float('price');
            $table->integer('capacity');
            $table->timestamps();

            $table->foreign('status_id')
                  ->references('id')
                  ->on('instance_statuses')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instances');
    }
}
