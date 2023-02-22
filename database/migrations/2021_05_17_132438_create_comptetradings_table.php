<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptetradingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptetradings', function (Blueprint $table) {
            $table->id();
            $table->integer('num_compte')->unique();
            $table->string('login');
            $table->string('modepass');
            $table->string('serveur');
            $table->string('utilisateur');
            $table->string('type_compte');
            $table->unsignedBigInteger('compte_id');
            $table->foreign('compte_id')
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
        Schema::dropIfExists('comptetradings');
    }
}
