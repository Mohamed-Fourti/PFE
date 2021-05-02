<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRéclamationsTable extends Migration
{
 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('réclamations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matiére')->nullable();
            $table->string('séance')->nullable();
            $table->json('propriétés');
            $table->text('remarques')->nullable();
            $table->string('etat')->default('création');
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('priorite')->default('normale');
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
        Schema::dropIfExists('réclamations');
        
    }
}