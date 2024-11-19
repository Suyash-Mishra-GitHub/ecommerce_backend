<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_log', function (Blueprint $table) {
            $table->id('log_id'); // Primary key (auto-incrementing)
            $table->enum('action_type', ['Create', 'Update', 'Delete'])->notNull(); // Action type (Create, Update, Delete)
            $table->string('table_name', 100); // Name of the table being changed
            $table->integer('record_id'); // ID of the affected record
            $table->unsignedBigInteger('changed_by'); // Changed_by should match admin_id type (unsignedBigInteger)
            $table->text('change_details'); // Details of the change (what was changed)
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP')); // Timestamp when the change occurred

            // Foreign key constraint to `admins` table
            $table->foreign('changed_by')->references('admin_id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_log');
    }
}
