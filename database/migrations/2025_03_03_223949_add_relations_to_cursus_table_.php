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
            if (!Schema::hasColumn('cursus', 'department_id')) {
                $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            }

            if (!Schema::hasColumn('cursus', 'emplois_id')) {
                $table->foreignId('emplois_id')->constrained('emplois')->onDelete('cascade');
            }

            if (!Schema::hasColumn('cursus', 'contract_id')) {
                $table->foreignId('contract_id')->constrained('contracts')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursus', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['emplois_id']);
            $table->dropForeign(['contract_id']);

            // Supprimer les colonnes
            $table->dropColumn(['department_id', 'emplois_id', 'contract_id']);
        });
    }
};
