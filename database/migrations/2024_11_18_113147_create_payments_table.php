<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Primary Key
            $table->unsignedBigInteger('order_id'); // Foreign key to orders table
            $table->enum('payment_method', ['Credit Card', 'Debit Card', 'Net Banking', 'UPI', 'COD']); // Payment method
            $table->enum('payment_status', ['Pending', 'Completed', 'Failed'])->default('Pending'); // Payment status
            $table->timestamp('payment_date')->useCurrent(); // Payment date with default to current timestamp
            $table->decimal('amount', 10, 2); // Payment amount
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
        Schema::dropIfExists('payments');
    }
}
