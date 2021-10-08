<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('unit_id');
            $table->text('lesson_objectives');
            $table->string('featured_video')->nullable();
            $table->unsignedBigInteger('exercise_id')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('exercise_id')
                    ->references('id')
                    ->on('excerises')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');  
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
        Schema::dropIfExists('lessons');
    }
}
