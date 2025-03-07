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
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->date('date_debut'); 
            $table->date('date_fin'); 
            $table->string('raison'); 
            $table->enum('statut', ['en_attente', 'approuvé', 'rejeté'])->default('en_attente'); 
            $table->enum('approbation_manager', ['en_attente', 'approuvé', 'rejeté'])->default('en_attente'); 
            $table->enum('approbation_rh', ['en_attente', 'approuvé', 'rejeté'])->default('en_attente'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
