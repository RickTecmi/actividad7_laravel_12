<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoboticsKit;

class RoboticsKitSeeder extends Seeder
{
    public function run()
    {
        RoboticsKit::create([
            'name' => 'StarterKit',
            'description' => 'Kit básico para principiantes en robótica'
        ]);

        RoboticsKit::create([
            'name' => 'Educational Robotics Kit',
            'description' => 'Kit educativo con componentes adicionales para entornos académicos'
        ]);

        RoboticsKit::create([
            'name' => 'Kit5',
            'description' => 'Kit avanzado con controladores programables y sensores de precisión'
        ]);
    }
}
