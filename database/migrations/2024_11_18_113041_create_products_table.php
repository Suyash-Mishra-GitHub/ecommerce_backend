<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Primary Key
            $table->string('product_name', 255); // Product name (not null)
            $table->unsignedBigInteger('category_id'); // Foreign key to categories table
            $table->unsignedBigInteger('vendor_id');  // Foreign key to users table (vendor)
            $table->text('description')->nullable(); // Description (nullable)
            $table->decimal('price', 10, 2); // Price (not null)
            $table->integer('stock_quantity')->default(0); // Stock quantity (default 0)
            $table->decimal('weight', 10, 2)->nullable(); // Weight (nullable)
            $table->string('dimensions', 100)->nullable(); // Dimensions (nullable)
            $table->string('sku', 50)->unique(); // Stock Keeping Unit (unique)
            $table->enum('product_status', ['Active', 'Inactive', 'Out of Stock'])->default('Active'); // Product status (default 'Active')
            $table->timestamps(); // created_at and updated_at

            // Foreign Key Constraints
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('vendor_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
