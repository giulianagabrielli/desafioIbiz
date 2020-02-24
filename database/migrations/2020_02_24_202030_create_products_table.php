<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('Produto');
            $table->string('Código Interno');
            $table->text('Descrição');
            $table->string('Data de Criação');
            $table->string('Inativo?');
            $table->string('Código Integração');
            $table->string('Quantidade p/ Embalagem');
            $table->string('Valor');
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
        Schema::dropIfExists('products');
    }
}
