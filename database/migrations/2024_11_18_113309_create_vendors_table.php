<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('vendor_id'); // Primary key for vendors
            $table->unsignedBigInteger('user_id'); // Foreign key reference to users table
            $table->string('store_name'); // Store name (required field)
            $table->text('store_description')->nullable(); // Store description (nullable)
            $table->boolean('is_active')->default(true); // Indicates whether the vendor is active
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Foreign key constraint to users table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
