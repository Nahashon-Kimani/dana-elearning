<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('units_id');
            $table->unsignedBigInteger('instructor_id');
            $table->string('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->date('access_upto')->nullable();
            $table->foreign('instructor_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('units_id')
                    ->references('id')
                    ->on('units')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('instructor_units');
    }
}
