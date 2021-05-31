<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichedevœuxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichedevœuxes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('Matieres');
            $table->foreignId('sem')
            ->constrained('fichedevœux_o_f_s')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('gsm');
            $table->string('chargeS1')->nullable();
            $table->string('chargeS2')->nullable();
            $table->json('jours')->nullable();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichedevœuxes');
    }
}