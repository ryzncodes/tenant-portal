<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaseTransaction;
use App\Models\Lease;
use App\Models\User;
use App\Models\Property;

class LeaseTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the number of transactions you want to create
        $numberOfTransactions = 50;

        // Use the factory to create transactions
        LeaseTransaction::factory($numberOfTransactions)->create()->each(function ($transaction) {
            // Optionally, you can perform additional tasks here for each transaction
        });
    }
}
