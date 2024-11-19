<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id'); // Primary key for admins
            $table->string('username', 50)->unique(); // Unique username
            $table->string('password'); // Password field
            $table->string('email', 100)->unique(); // Unique email address
            $table->enum('role', ['SuperAdmin', 'Admin', 'Moderator'])->default('Admin'); // Role field with default value 'Admin'
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
