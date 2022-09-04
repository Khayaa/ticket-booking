<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->enum('event_type' ,['paid' ,'free',])->default('free');
            $table->enum('status' ,['active' ,'inactive'])->default('active');
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->longText('description');
            $table->decimal('price')->nullable();
            $table->string('date');
            $table->string('time');
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
        Schema::dropIfExists('events');
    }
};
