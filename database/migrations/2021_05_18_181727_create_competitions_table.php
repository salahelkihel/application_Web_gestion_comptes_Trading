<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
$table->id();
$table->string('statut_formation');
$table->string('Duree');
$table->string('decision');
$table->unsignedBigInteger('cin_compte');
$table->foreign('cin_compte')
    ->references('id')
    ->on('comptes')
    ->onDelete('restrict')
    ->onUpdate('restrict');
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
        Schema::dropIfExists('competitions');
    }
}
