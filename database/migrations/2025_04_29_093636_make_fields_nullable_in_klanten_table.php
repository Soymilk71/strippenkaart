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
        Schema::table('klanten', function (Blueprint $table) {
            $table->integer('aantal_uren')->nullable()->change();
            $table->boolean('is_admin')->nullable()->change();
            $table->string('bedrijf')->nullable()->change();
            $table->rememberToken()->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
    //nullable(false) voor als ik ooit besluit een rollback te doen omdat dit misschien niet werkt. Very safe! very future proof!
    Schema::table('klanten', function (Blueprint $table) {
            $table->integer('aantal_uren')->nullable(false)->change();
            $table->boolean('is_admin')->nullable(false)->change();
            $table->string('bedrijf')->nullable(false)->change();
            $table->rememberToken()->nullable(false)->change(); 
        });
    }
};
