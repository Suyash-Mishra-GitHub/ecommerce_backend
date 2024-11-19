<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('coupon_id'); // Primary key (auto-incrementing)
            $table->string('coupon_code', 50)->unique(); // Coupon code (unique)
            $table->integer('discount_percentage')->check('discount_percentage BETWEEN 1 AND 100'); // Discount percentage between 1 and 100
            $table->date('valid_from'); // Validity start date
            $table->date('valid_until'); // Validity end date
            $table->decimal('min_order_value', 10, 2)->nullable(); // Minimum order value (nullable)
            $table->boolean('is_active')->default(true); // Coupon status (active or inactive)

            // Adding timestamps for created and updated columns is optional
            $table->timestamps(); // Optional: you can add timestamps to track creation and updates
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
