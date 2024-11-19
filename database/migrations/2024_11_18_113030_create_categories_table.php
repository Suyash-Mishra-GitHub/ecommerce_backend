<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id'); // Primary Key
            $table->string('category_name', 100); // Category name (not null)
            $table->text('description')->nullable(); // Description (nullable)
            $table->unsignedBigInteger('parent_category_id')->nullable(); // Parent category ID (nullable)
            $table->timestamps(); // created_at and updated_at

            // Foreign Key constraint for parent_category_id
            $table->foreign('parent_category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
