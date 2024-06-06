<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru', 300);
            $table->string('name_kz', 300);
            $table->string('name_en', 300);
            $table->string('type', 3)->default('mio');
            $table->string('total_2020', 6);
            $table->string('total_2021', 6);
            $table->string('total_2022', 6);
            $table->string('total_2023', 6);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
