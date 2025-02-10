<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            // $table->foreignId('user_id')->constrained('user_car')->onDelete('cascade');
            // $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->integer('user_id');
            $table->integer('car_id');
            $table->date('rental_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
