<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColloqueScientifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colloque_scientifiques', function (Blueprint $table) {
            $table->id();
            $table->string('الصفة');
            $table->string('الأختصاص');
            $table->string('الندوة');
            $table->date('من');
            $table->date('إلى');
            $table->string('بيان');
            $table->string('مقدار');
            $table->string('الجهة');
            $table->string('nom');
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
        Schema::dropIfExists('colloque_scientifiques');
    }
}
