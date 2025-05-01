<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * CREATE TABLE `eventos` (
     * `id_evento` int(11) NOT NULL,
     * `fk_id_usuario` int(11) DEFAULT NULL,
     * `titulo` varchar(255) NOT NULL,
     * `descricao` varchar(255) NOT NULL,
     * `cor` varchar(7) DEFAULT NULL,
     * `inicio` datetime NOT NULL,
     * `termino` datetime DEFAULT NULL
     * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     */
    public function up(): void
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->string('cor', '7')->default(null)->nullable();
            $table->date('inicio_data')->nullable();
            $table->time('inicio_hora')->nullable();
            $table->date('termino_data')->nullable();
            $table->time('termino_hora')->nullable();
            $table->string('status')->default(1);
            $table->string('notification')->default(0)->nullable();
            $table->bigInteger('id_usuario')->unsigned();
            $table->bigInteger('id_category')->unsigned()->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
