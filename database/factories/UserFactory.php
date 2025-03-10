<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Group;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        // Obtenemos IDs de grupos existentes
        $groupIds = Group::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // Nuevos campos
            'role' => fake()->randomElement(['student', 'teacher', 'admin']),
            'group_id' => function (array $attributes) use ($groupIds) {
                // Solo asignar grupo si es estudiante
                return $attributes['role'] === 'student'
                    ? fake()->randomElement($groupIds)
                    : null;
            },
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    // Estado para crear específicamente estudiantes
    public function student(): static
    {
        return $this->state(function () {
            $groupIds = Group::pluck('id')->toArray();
            return [
                'role' => 'student',
                'group_id' => fake()->randomElement($groupIds),
            ];
        });
    }

    // Estado para crear específicamente profesores
    public function teacher(): static
    {
        return $this->state(fn () => [
            'role' => 'teacher',
            'group_id' => null,
        ]);
    }

    // Estado para crear específicamente administradores
    public function admin(): static
    {
        return $this->state(fn () => [
            'role' => 'admin',
            'group_id' => null,
        ]);
    }
}
