<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) { //'Blueprint $table' é um objeto que permite definir as colunas da tabela.
            $table->id();
            $table->string('categorias',100);
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
