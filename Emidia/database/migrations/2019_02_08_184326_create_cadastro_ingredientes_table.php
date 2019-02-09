<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastroIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro_ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cadastro_receita')->unsigned();
            $table->foreign('id_cadastro_receita')->references('id')->on('cadastro_receitas')->onDelete('cascade');
            $table->string('ingrediente');
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
        Schema::dropIfExists('cadastro_ingredientes');
    }
}
