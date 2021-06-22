<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableauAffichagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableau_affichages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('class');
            $table->string('remarques')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();;
            $table->text('body')->nullable();;
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('categories_id')->nullable()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dateTime('date_début')->nullable();
            $table->dateTime('date_finale')->nullable();
            $table->string('lieu')->nullable();
            $table->string('formateur')->nullable();
            $table->string('durée')->nullable();
            $table->string('Nbseance')->nullable();
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
        Schema::dropIfExists('tableau_affichages');
    }
}
