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
        Schema::create('financeiros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->string('cor', '7')->default(null)->nullable();
            $table->date('pagamento_data')->nullable();
            $table->time('pagamento_hora')->default('12:00')->nullable();
            $table->string('status')->default(1);
            $table->string('notification')->default(0)->nullable();
            $table->date('notification_data')->nullable();
            $table->time('notification_hora')->nullable();
            $table->integer('recorrencia')->default(0);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->default(auth()->id());
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('updated_by')->default(auth()->id());
            $table->bigInteger('id_usuario')->unsigned();
            $table->bigInteger('id_category')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiros');
    }
};
