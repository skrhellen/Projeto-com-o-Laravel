<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('joia', function (Blueprint $table) {
           $table->foreignId('categoria_id')->nullable()
            ->constrained('categorias')->after('id');
        });

        Schema::enableForeignKeyConstraints();
    }


    public function down(): void
    {
        Schema::table('joia', function (Blueprint $table) {
            //
        });
    }
};
