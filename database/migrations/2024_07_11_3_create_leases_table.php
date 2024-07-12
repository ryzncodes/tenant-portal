<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('tenant_id');
            $table->decimal('rent_amount', 10, 2);
            $table->decimal('deposit_amount', 10, 2);
            $table->unsignedBigInteger('property_id');
            $table->timestamps();

            // Foreign key
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('tenant_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('leases');
    }
}
