<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id'); //singular do nome da tabela _id
            $table->float('comprimento', 8,2);
            $table->float('largura', 8,2);
            $table->float('altura', 8,2);
            $table->timestamps();

            //constraint
            $table->foreign('produto_id')->references('id')->on('produtos');
            //relacionamento 1 para 1
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
