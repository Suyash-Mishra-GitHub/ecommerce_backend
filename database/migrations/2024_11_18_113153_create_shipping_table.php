<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->id('shipping_id'); // Primary key for shipping
            $table->unsignedBigInteger('order_id'); // Foreign key to orders table
            $table->string('tracking_number', 50)->nullable(); // Tracking number (nullable)
            $table->timestamp('shipping_date')->useCurrent(); // Shipping date (default to current timestamp)
            $table->date('estimated_delivery_date')->nullable(); // Estimated delivery date (nullable)
            $table->date('actual_delivery_date')->nullable(); // Actual delivery date (nullable)
            $table->enum('shipping_status', ['Pending', 'Shipped', 'In Transit', 'Delivered', 'Returned'])->default('Pending'); // Shipping status
            $table->timestamps(); // created_at and updated_at

            // Foreign Key Constraints
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping');
    }
}
