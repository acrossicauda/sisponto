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
        Schema::create('whatsapp', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('message')->nullable();
            $table->string('send_status')->nullable();
            $table->json('json_whatsapp')->nullable();
            $table->integer('is_send')->default(0);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->default(auth()->id());
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('updated_by')->default(auth()->id());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp');
    }
};
