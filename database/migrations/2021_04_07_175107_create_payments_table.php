<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paid_by');
            $table->integer('amount');
            $table->string('mpesa_code')->unique();
            $table->unsignedBigInteger('authorised_by')->nullable();
            $table->unsignedBigInteger('courses_id');
            $table->integer('status')->default(0);
            $table->foreign('courses_id')
                    ->references('id')
                    ->on('courses')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('paid_by')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('authorised_by')
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
        Schema::dropIfExists('payments');
    }
}
