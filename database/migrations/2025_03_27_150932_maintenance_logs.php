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
        Schema::create('maintenance_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_card_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('hours_logged', 5, 2);
            $table->string('ticket_number')->nullable();
            $table->text('description')->nullable();
            $table->date('log_date');
            $table->foreign('maintenance_card_id')->references('id')->on('maintenance_cards')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
