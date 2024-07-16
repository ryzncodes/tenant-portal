<?php

namespace Database\Factories;

use App\Models\Lease;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaseFactory extends Factory
{
    protected $model = Lease::class;

    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween('-2 years', '-1 year');
        $end_date = (clone $start_date)->modify('+5 years');

        return [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tenant_id' => 1,
            'rent_amount' => $this->faker->numberBetween(2000, 10000),
            'deposit_amount' => $this->faker->numberBetween(2000, 10000),
            'property_id' => 1,
        ];
    }
}
