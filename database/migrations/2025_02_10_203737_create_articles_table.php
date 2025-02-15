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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('user_id') -> constrained() -> cascadeOnDelete();
            $table -> foreignId('tag_id') -> constrained() -> cascadeOnDelete();
            $table -> string("title") -> unique();
            $table -> text("content");  
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
