<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * @see CreateColumnsTable column_id
         */
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('column_id')->unsigned();
            $table->smallInteger('order');
            $table->date('custom_date')->nullable();

            $table->foreign('column_id')->references('id')->on('columns')
                ->onDelete('cascade');

            $table->index('column_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}