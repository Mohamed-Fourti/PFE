<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('hardware')->nullable();
            $table->text('software')->nullable();
            $table->string('résultat');
            $table->bigInteger('technicien_id')->nullable()->unsigned()->index();
            $table->foreign('technicien_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedInteger('réclamation_id')->nullable();
            $table->foreign('réclamation_id')->references('id')->on('réclamations')->onUpdate('cascade')->onDelete('set null');
            $table->string('cause')->nullable();
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
        Schema::dropIfExists('traitements');
    }
}