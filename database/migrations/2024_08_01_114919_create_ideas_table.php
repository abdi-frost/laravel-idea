<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * varchar 240 chars
     * likes unsigned int 0 
     * createdAt
     * updatedAt
     */
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('content');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps(); //created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     * Basically to drop the table
     * dont need to come here
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
