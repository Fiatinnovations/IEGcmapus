<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('title_id')->nullable();
            $table->integer('gender_id')->index()->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('university_id')->index()->unsigned()->nullable();
            $table->integer('course_id')->index()->unsigned()->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('slug');
            $table->string('certificate')->nullable();
            $table->string('transcript')->nullable();
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('prospects');
    }
}
