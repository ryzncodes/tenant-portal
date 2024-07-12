<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lease_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lease_id');
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('property_id');
            $table->date('transaction_date');
            $table->decimal('amount_paid', 10, 2);
            $table->string('payment_method', 100);
            $table->enum('payment_status', ['pending', 'paid', 'cancelled']);
            $table->timestamps();

            // Foreign keys
            $table->foreign('lease_id')->references('id')->on('leases');
            $table->foreign('tenant_id')->references('id')->on('users');
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lease_transactions');
    }
}
