<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('joias', function (Blueprint $table) {
            $table->id();
            $table->string("nome",100);
            $table->string("material",100);
            $table->string("valor",100);
            $table->timestamps(); //cria automaticamente duas colunas chamadas created_at e updated_at para realizar um controle de atualização e criação de registros.
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('joias');
    }
};
