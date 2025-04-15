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
        Schema::create('strippen', function(Blueprint $table){
            $table->id();
            $table->integer('klant_id');
            $table->date('date');
            $table->string('type');
            $table->integer('uren')->nullable();
            $table->integer('uren_na_submit')->nullable();
            $table->string('titel')->nullable();
            $table->string('omschrijving')->nullable();
            $table->string('jira_link')->nullable();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
