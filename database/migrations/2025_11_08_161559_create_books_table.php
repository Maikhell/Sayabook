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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            
            // FOREIGN KEY: Links the book to the user who owns it
            // 'constrained()' assumes a 'users' table and creates the foreign key.
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Book Details (Based on your form)
            $table->string('book_title', 255);
            $table->string('book_author', 255);
            $table->text('book_description')->nullable();
            
            // Cover Image
            $table->string('book_cover')->nullable(); 

            // Status and Categories (Ensure names match your form inputs)
            $table->enum('book_status', ['reading', 'completed', 'to_read', 'dropped']);
            $table->string('book_category', 50)->nullable();
            $table->string('book_genre', 50)->nullable();
            
            // Privacy and Link
            $table->string('book_privacy', 20)->default('private'); 
            $table->string('book_online_link')->nullable();

            // Date Added 
            $table->date('date_added');

            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};