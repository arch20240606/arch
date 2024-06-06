<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('goverment_id');
            $table->unsignedBigInteger('information_systems_id');
            $table->integer('data_used');
            $table->integer('data_enter');
            $table->integer('data_first');
            $table->integer('data_agregate');
            $table->integer('data_access_only');
            $table->integer('data_access_free');
            $table->string('users_npa');
            $table->string('data_source');
            $table->string('data_source_fact');
            $table->integer('object_description');
            $table->integer('interval_update');
            $table->integer('graphic_update');
            $table->string('update_rules');
            $table->integer('geo');
            $table->integer('geo_type');
            $table->string('npa_list');
            $table->string('npa_list_reglament');
            $table->string('npa_list_rules');
            $table->string('info_object');
            $table->string('object_used');
            $table->string('object_change');
            $table->string('file_excel');

            $table->string('type_name_data');
            $table->string('object_name_data');
            $table->integer('data_class');
            $table->string('npa_data');
            $table->integer('form_approve');
            $table->integer('degree_access');
            $table->integer('priznak_public');
            $table->string('date_publication');
            $table->string('file_sostav');

            $table->string('block_indicator');
            $table->string('name_indicator');
            $table->integer('block_type');
            $table->integer('block_value');

            $table->integer('draft')->default('0');
            $table->integer('send')->default('0');
            $table->timestamps();
        });


        // Затем добавляем ключи
        Schema::create('passports', function (Blueprint $table) {
            $table->foreign('user_id')->reference('id')->on('users');
            $table->foreign('goverment_id')->reference('id')->on('governments');
            $table->foreign('information_systems_id')->reference('id')->on('information_systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
