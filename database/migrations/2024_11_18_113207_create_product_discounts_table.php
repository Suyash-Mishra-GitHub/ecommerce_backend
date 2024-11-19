<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id('discount_id'); // Primary key for the discount
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->integer('discount_percentage')->check('discount_percentage BETWEEN 1 AND 100'); // Discount percentage between 1 and 100
            $table->date('discount_start_date'); // Discount start date
            $table->date('discount_end_date'); // Discount end date
            $table->timestamps(); // created_at and updated_at columns

            // Foreign Key Constraints
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
        Schema::dropIfExists('product_discounts');
    }
}
