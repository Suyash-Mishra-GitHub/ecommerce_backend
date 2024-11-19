<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id'); // Primary key for reviews table
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->integer('rating')->check('rating >= 1 AND rating <= 5'); // Rating between 1 and 5
            $table->text('review_text')->nullable(); // Review text (nullable)
            $table->timestamp('review_date')->useCurrent(); // Timestamp when the review is created
            $table->timestamps(); // created_at and updated_at columns

            // Foreign Key Constraints
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
