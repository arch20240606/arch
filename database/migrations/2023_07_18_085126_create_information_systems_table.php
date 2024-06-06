<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Сначала создаем поля
        Schema::create('information_systems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('goverment_id');
            $table->string('name_ru', 255)->unique();
            $table->string('name_kz', 255)->unique();
            $table->string('name_en', 255)->unique();
            $table->integer('status')->default('0');
            $table->timestamps();
        });

        // Затем добавляем ключи
        Schema::create('information_systems', function (Blueprint $table) {
            $table->foreign('user_id')->reference('id')->on('users');
            $table->foreign('goverment_id')->reference('id')->on('governments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_systems');
    }
}
