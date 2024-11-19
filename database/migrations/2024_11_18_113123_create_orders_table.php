<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->enum('order_status', ['Pending', 'Shipped', 'Delivered', 'Cancelled', 'Returned'])->default('Pending'); // Order status
            $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Order date
            $table->decimal('total_amount', 10, 2); // Total order amount
            $table->text('shipping_address'); // Shipping address
            $table->text('billing_address'); // Billing address
            $table->enum('payment_status', ['Pending', 'Completed', 'Failed'])->default('Pending'); // Payment status
            $table->enum('shipping_status', ['Not Shipped', 'Shipped', 'In Transit', 'Delivered'])->default('Not Shipped'); // Shipping status
            $table->timestamps(); // created_at and updated_at

            // Foreign Key Constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
