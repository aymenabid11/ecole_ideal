<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('niveau_scolaire');
            $table->string('numero_telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->integer('code_postale');
            $table->foreignId('formation_id')
                  ->constrained('formations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('batiment_id')
                  ->constrained('batiments')
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
        Schema::dropIfExists('etudiants');
    }
};
