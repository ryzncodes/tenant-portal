<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lease;

class LeaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lease::factory()->count(1)->create();
    }
}
