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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();            
            $table->text('content');            
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->comment('ID del usuario que genero el mensaje');
            $table->foreignId('chat_id')
                  ->constrained('chats')
                  ->comment('ID del chat donde se genero el mensaje');
            $table->timestamps();
            $table->comment('Mensajes que hay en los chats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
