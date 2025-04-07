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
        //
        Schema::create('klanten', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('aantal_uren');
            $table->boolean('is_admin')->default(false);
            $table->string('bedrijf');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
