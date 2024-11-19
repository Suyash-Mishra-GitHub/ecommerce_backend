<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('email', 100)->unique();
            $table->string('phone_number', 15);
            $table->text('address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->enum('user_type', ['Customer', 'Admin', 'Vendor'])->default('Customer');
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

