<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRattrapagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rattrapages', function (Blueprint $table) {
            $table->id();
            $table->string('matiere');
            $table->string('classe');
            $table->text('motifRemplace');
            $table->date('jour1');
            $table->string('seance1');
            $table->date('jour2');
            $table->string('seance2');
            $table->string('salle');
            $table->foreignId('user_id')
            ->constrained()
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
        Schema::dropIfExists('rattrapages');
    }
}
