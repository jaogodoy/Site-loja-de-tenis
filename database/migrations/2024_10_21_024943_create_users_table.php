<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->string('first_name'); // Primeiro nome
            $table->string('last_name'); // Último nome
            $table->string('email')->unique(); // Email único
            $table->string('password'); // Senha
            $table->rememberToken(); // Token para "lembrar" o usuário
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users'); // Remove a tabela se a migration for revertida
    }
}

