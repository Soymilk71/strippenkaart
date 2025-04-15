<?php

namespace Database\Factories;

use App\Models\Klanten;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KlantenFactory extends Factory
{
    // Hier hoort 'model' te staan, buiten de definition()
    protected $model = Klanten::class;

    protected static ?string $password;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'voornaam'       => $this->faker->firstName(),
            'achternaam'     => $this->faker->lastName(),
            'email'          => $this->faker->unique()->safeEmail(),
            'password'       => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'aantal_uren'    => 0,
            'is_admin'       => false,
            'bedrijf'        => $this->faker->company(),
        ];
    }
}
