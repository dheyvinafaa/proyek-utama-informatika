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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menu')->onDelete('cascade');
            $table->foreignId('canteen_id')->constrained('canteen')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('note')->nullable();
            $table->enum('type', ['dineIn', 'pickUp']);
            $table->enum('status', ['unpaid', 'paid']);
            $table->timestamp('received_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
