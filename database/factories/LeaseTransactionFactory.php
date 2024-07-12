<?php

namespace Database\Factories;

use App\Models\LeaseTransaction;
use App\Models\Lease;
use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaseTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaseTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lease = Lease::inRandomOrder()->first();

        return [
            'lease_id' => Lease::factory(),
            'tenant_id' => User::where('role', 'tenant')->inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'transaction_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'amount_paid' => $lease->rent_amount,
            'payment_method' => $this->faker->randomElement(['cash', 'bank_transfer', 'credit_card']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'cancelled']),
        ];
    }
}
