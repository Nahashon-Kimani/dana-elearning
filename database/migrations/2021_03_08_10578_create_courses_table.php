<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('desc');
            $table->text('summary');
            $table->string('cost');
            $table->string('duration');
            $table->string('image_url');
            $table->unsignedBigInteger('course_outline')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('created_by');
            // $table->foreign('course_outline')
            //         ->references('id')
            //         ->on('course_outline')
            //         ->onUpdate('cascade')
            //         ->onDelete('cascade');
            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
