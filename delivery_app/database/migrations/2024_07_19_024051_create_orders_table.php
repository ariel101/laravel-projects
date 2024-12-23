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
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->string('delivery_address');
            $table->integer('total_amount');
            $table->string('city',50);
            $table->string('status',50);
            $table->datetime('order_datetime');
            $table->datetime('delivery_datetime'); //fecha de entrega prevista
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
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
