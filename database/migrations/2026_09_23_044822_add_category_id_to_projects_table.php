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
        Schema::table('projects', function (Blueprint $table) {

        //aggiungiamo la colonna category_id alla tabella project e la costrains
            $table->foreignId('category_id')->default(1)->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //eliminiamo la constraint
            $table->dropForeign(['category_id']);
            //eliminiamo la colonna category_id
            $table->dropColumn('category_id');
        });
    }
};
