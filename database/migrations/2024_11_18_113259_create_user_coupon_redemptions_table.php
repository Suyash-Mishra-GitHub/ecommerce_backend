<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserCouponRedemptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupon_redemptions', function (Blueprint $table) {
            $table->id('redemption_id'); // Primary key (auto-incrementing)
            $table->unsignedBigInteger('user_id'); // Foreign key reference to users table
            $table->unsignedBigInteger('coupon_id'); // Foreign key reference to coupons table
            $table->timestamp('redeemed_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Timestamp when coupon was redeemed
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Foreign key constraint to users
            $table->foreign('coupon_id')->references('coupon_id')->on('coupons')->onDelete('cascade'); // Foreign key constraint to coupons
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_coupon_redemptions');
    }
}
