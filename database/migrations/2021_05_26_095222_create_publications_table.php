<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();;
            $table->text('meta_keywords')->nullable();;
            $table->boolean('active')->default(false);
            $table->string('image')->nullable();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('categories_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->dateTime('date_début')->nullable();
            $table->dateTime('date_finale')->nullable();
            $table->string('lieu')->nullable();
            $table->string('formateur')->nullable();
            $table->string('durée')->nullable();
            $table->string('Nbseance')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}