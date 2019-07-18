<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('horario_início',8);
            $table->string('horario_fim',8);
            $table->integer('capacidade_maxima');
            $table->unsignedBigInteger('speakers_id')->nullable();
            $table->timestamps();
        });

        Schema::table('lectures', function (Blueprint $table) {
            $table->foreing('speakers_id')->references('id')->on('speakers')->onDelete('set null');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
