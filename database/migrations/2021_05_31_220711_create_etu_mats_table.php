<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtuMatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etu_mats', function (Blueprint $table) {
            $table->id();
            $table->string('département');
            $table->string('class');
            $table->string('name');
            $table->string('file_path');
            $table->foreignId('sem')
            ->constrained('fichedevœux_o_f_s')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('etu_mats');
    }
}
