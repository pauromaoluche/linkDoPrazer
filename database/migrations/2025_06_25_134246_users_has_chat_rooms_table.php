<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_has_chat_rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id'); // FK para users
            $table->unsignedBigInteger('chat_rooms_id'); // FK para chat_rooms
            $table->timestamp('entered_room')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Definindo as chaves estrangeiras
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('chat_rooms_id')->references('id')->on('chat_rooms')->onDelete('cascade');

            // Índice único para evitar duplicidade no relacionamento
            $table->unique(['users_id', 'chat_rooms_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_has_chat_rooms');
    }
};
