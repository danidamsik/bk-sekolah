<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $role = fake()->randomElement(['Admin', 'GuruBK', 'WaliKelas']);

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => $role,
            'teacher_id' => $role === 'Admin'
                ? null
                : Teacher::inRandomOrder()->first()->id,
            'remember_token' => Str::random(10),
        ];
    }
}
