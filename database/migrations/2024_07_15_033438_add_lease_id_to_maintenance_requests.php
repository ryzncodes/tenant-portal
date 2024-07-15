<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column already exists
        if (!Schema::hasColumn('maintenance_requests', 'lease_id')) {
            Schema::table('maintenance_requests', function (Blueprint $table) {
                $table->unsignedBigInteger('lease_id')->nullable();

                // Add foreign key constraint
                $table->foreign('lease_id')
                    ->references('id')
                    ->on('leases')
                    ->onDelete('cascade'); // or 'set null' depending on your requirements
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenance_requests', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['lease_id']);

            // Drop the column
            $table->dropColumn('lease_id');
        });
    }
};
