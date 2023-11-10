<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table
            ->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //TODO Todas las migraciones deben tener un rollback
        Schema::table('todos', function (Blueprint $table) {
            //1. Eliminar la llave foranea
            //2. Eliminar la columna
        });
    }
};
