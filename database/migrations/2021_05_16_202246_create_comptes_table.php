<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('Email');
            $table->string('Email_theCube');
            $table->string('address');
            $table->integer('telephone');
            $table->unsignedBigInteger('equipes_id'); 
   
            $table->foreign('equipes_id')
                ->references('id')
                ->on('equipes')
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
        Schema::dropIfExists('comptes');
    }
}
