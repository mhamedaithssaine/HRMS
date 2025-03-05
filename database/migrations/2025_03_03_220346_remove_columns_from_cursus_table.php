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
        Schema::table('cursus', function (Blueprint $table) {
            
            $table->dropColumn(['date', 'contrat', 'position', 'department_id', 'emplois_id', 'contract_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursus', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->integer('contrat')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('emplois_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();

        });
    }
};
