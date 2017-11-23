<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->unsignedInteger('document_type_id')->nullable();
            $table->string('document_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedInteger('user_id');
            $table->float('rate')->default(2.5);
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('document_type_id')
                  ->references('id')
                  ->on('document_types')
                  ->onDelete('set null')
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
        Schema::dropIfExists('customers');
    }
}
