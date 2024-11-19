<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing)
            $table->foreignId('user_id') // Foreign key to users table
                ->constrained('users', 'user_id') // Explicitly mention the column name in the users table
                ->onDelete('cascade'); // Cascade on delete
            $table->foreignId('product_id') // Foreign key to products table
                ->constrained('products', 'product_id') // Explicitly mention the column name in the products table
                ->onDelete('cascade'); // Cascade on delete
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
        Schema::dropIfExists('wishlists');
    }
}
