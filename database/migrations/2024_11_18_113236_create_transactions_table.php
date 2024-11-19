<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // Primary key for transactions table
            $table->foreignId('order_id') // Foreign key for the orders table
                ->constrained('orders', 'order_id') // Explicitly mention the column 'order_id' in the orders table
                ->onDelete('cascade'); // Cascade delete when the order is deleted
            $table->foreignId('payment_id') // Foreign key for the payments table
                ->constrained('payments', 'payment_id') // Reference to the payments table
                ->onDelete('cascade'); // Cascade delete when the payment is deleted
            $table->enum('transaction_status', ['Success', 'Failure', 'Pending'])->default('Pending');
            $table->timestamp('transaction_date')->useCurrent();
            $table->decimal('amount', 10, 2); // Amount for the transaction
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
