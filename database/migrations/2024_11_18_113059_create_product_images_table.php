<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('image_id'); // Primary Key
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->string('image_url', 255); // Image URL (not null)
            $table->boolean('is_main_image')->default(false); // Indicates if it's the main image (default false)
            $table->timestamps(); // created_at and updated_at

            // Foreign Key Constraint
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
