<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use App\Models\RoboticsKit;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class RoboticsDataSeeder extends Seeder
{
    public function run()
    {
        // Crear kits de robótica
        $starterKit = RoboticsKit::create([
            'name' => 'Starter Kit',
            'description' => 'Kit básico para principiantes'
        ]);

        $educationalKit = RoboticsKit::create([
            'name' => 'Educational Kit',
            'description' => 'Kit educativo con componentes adicionales'
        ]);

        $kit5 = RoboticsKit::create([
            'name' => 'Advanced Kit 5.0',
            'description' => 'Kit avanzado con controladores programables'
        ]);

        // Crear grupos
        $beginnerGroup = Group::create([
            'name' => 'principiante',
            'description' => 'Grupo para estudiantes sin experiencia previa'
        ]);

        $intermediateGroup = Group::create([
            'name' => 'intermedio',
            'description' => 'Grupo para estudiantes con conocimientos básicos'
        ]);

        $advancedGroup = Group::create([
            'name' => 'avanzado',
            'description' => 'Grupo para estudiantes con experiencia'
        ]);

        // Crear cursos
        $courses = [
            [
                'key' => 'Rob101',
                'title' => 'Introduction to Robotics',
                'content' => 'Curso básico de introducción a la robótica',
                'robotics_kit_id' => $starterKit->id
            ],
            [
                'key' => 'Rob102',
                'title' => 'Introduction to Automation',
                'content' => 'Fundamentos de automatización',
                'robotics_kit_id' => $starterKit->id
            ],
            [
                'key' => 'Rob103',
                'title' => 'Programming for Robotics',
                'content' => 'Programación aplicada a robots',
                'robotics_kit_id' => $educationalKit->id
            ],
            [
                'key' => 'Rob104',
                'title' => 'Characteristics of a Robot',
                'content' => 'Componentes y características robóticas',
                'robotics_kit_id' => $kit5->id
            ],
        ];

        // Guardar cursos y asignarlos a grupos
        foreach ($courses as $courseData) {
            $course = Course::create($courseData);

            if ($course->key == 'Rob101' || $course->key == 'Rob102') {
                $course->groups()->attach($beginnerGroup->id);
            }

            if ($course->key == 'Rob102' || $course->key == 'Rob103') {
                $course->groups()->attach($intermediateGroup->id);
            }

            if ($course->key == 'Rob103' || $course->key == 'Rob104') {
                $course->groups()->attach($advancedGroup->id);
            }
        }

        // Crear usuarios de ejemplo
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'group_id' => null
            ],
            [
                'name' => 'Teacher User',
                'email' => 'teacher@example.com',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'group_id' => null
            ],
            [
                'name' => 'Beginner Student',
                'email' => 'beginner@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'group_id' => $beginnerGroup->id
            ],
            [
                'name' => 'Advanced Student',
                'email' => 'advanced@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'group_id' => $advancedGroup->id
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
