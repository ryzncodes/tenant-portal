<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyLeasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('leases', function (Blueprint $table) {
            // Make start_date, end_date, and tenant_id nullable
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
            $table->unsignedBigInteger('tenant_id')->nullable()->change();

            // Add foreign key constraint if tenant_id is used as a foreign key
            // $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('leases', function (Blueprint $table) {
            // Reverse changes if necessary
            $table->date('start_date')->nullable(false)->change();
            $table->date('end_date')->nullable(false)->change();
            $table->unsignedBigInteger('tenant_id')->nullable(false)->change();

            // Drop foreign key constraint if added
            // $table->dropForeign(['tenant_id']);
        });
    }
}
