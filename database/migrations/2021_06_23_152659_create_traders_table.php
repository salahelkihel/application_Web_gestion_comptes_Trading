<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
            $table->string('Symbole');
            $table->integer('Position');
            $table->date('Heure');
            $table->string('Type');
     
            $table->double('Prix');
            $table->double('Prix_du_marche');
        
            $table->double('Action');
            $table->unsignedBigInteger('num_compte');
            $table->foreign('num_compte')
            ->references('num_compte')
            ->on('comptetradings')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traders');
    }
}
