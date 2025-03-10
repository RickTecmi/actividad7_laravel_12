<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            GroupSeeder::class,     // Crear grupos primero
            RoboticsKitSeeder::class, // Luego kits
            UserSeeder::class,      // Luego usuarios
            CourseSeeder::class     // Finalmente cursos
        ]);
    }
}
