<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id'); // Primary key for inventory table
            $table->foreignId('product_id') // Foreign key for the products table
                ->constrained('products', 'product_id') // Explicitly mention the column 'product_id' in the products table
                ->onDelete('cascade'); // Cascade delete when the product is deleted
            $table->integer('quantity'); // Quantity of product in the inventory
            $table->enum('inventory_status', ['In Stock', 'Out of Stock', 'Replenishing'])->default('In Stock'); // Inventory status
            $table->timestamps(); // Adds `created_at` and `updated_at` columns by default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
