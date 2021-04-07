<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'phone'     => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'state' => $this->faker->randomElement(['abeokuta_north', 'abeokuta_south', 'Ado_Odo_Ota', 'ewekoro', 'ifo', 'ijebu_east', 'ijebu_north', 'ijebu_north_east', 'ijebu_ode', 'ikenne', 'imeko_afon', 'ipokia', 'obafemi_owode', 'odeda', 'odogbolu', 'ogun_waterside', 'remo_north', 'sagamu', 'yewa_north', 'yewa_south']),
            'email_verified_at' => now(),
            'address' => $this->faker->address(),
            'ogwema_ref' => Str::random(10),
            'role' => $this->faker->randomElement(['user', 'admin']),
            'password' => $this->faker->password(), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
