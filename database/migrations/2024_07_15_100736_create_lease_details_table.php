<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lease_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lease_id');
            $table->foreign('lease_id')->references('id')->on('leases')->onDelete('cascade');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->enum('furnished', ['fully', 'partially', 'unfurnished']);
            $table->integer('square_feet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lease_details');
    }
}
