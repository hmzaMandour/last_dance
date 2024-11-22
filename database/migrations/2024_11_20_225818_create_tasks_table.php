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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->text('description');
            $table->timestamp('deadline')->nullable();
            $table->enum('priority', ['High', 'Medium', 'Low']); 
            $table->enum('status', ['Pending', 'Completed', 'Overdue'])->default('Pending'); 
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete(); 
            $table->foreignId('assigned_to')->nullable()->constrained('users')->cascadeOnDelete(); 
            $table->foreignId('team_id')->nullable()->constrained('teams')->cascadeOnDelete();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
