<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Group;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Primero creamos los 4 cursos específicos mencionados
        $courses = [
            [
                'key' => 'Rob101',
                'title' => 'Introduction to Robotics',
                'content' => 'Curso básico de introducción a la robótica',
                'robotics_kit_id' => 1 // StarterKit
            ],
            [
                'key' => 'Rob102',
                'title' => 'Introduction to Automation',
                'content' => 'Fundamentos de automatización',
                'robotics_kit_id' => 1 // StarterKit
            ],
            [
                'key' => 'Rob103',
                'title' => 'Programming for Robotics',
                'content' => 'Programación aplicada a robots',
                'robotics_kit_id' => 2 // Educational Robotics Kit
            ],
            [
                'key' => 'Rob104',
                'title' => 'Characteristics of a Robot',
                'content' => 'Componentes y características robóticas',
                'robotics_kit_id' => 3 // Kit5
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        // Luego generamos 96 cursos adicionales para llegar a 100
        Course::factory()->count(96)->create();

        // Asignamos cursos a grupos
        $beginnerGroup = Group::where('name', 'principiante')->first();
        $intermediateGroup = Group::where('name', 'intermedio')->first();
        $advancedGroup = Group::where('name', 'avanzado')->first();

        // Asignar todos los cursos aleatoriamente a grupos
        Course::all()->each(function ($course) use ($beginnerGroup, $intermediateGroup, $advancedGroup) {
            $randomGroups = [];

            // Cada curso se asigna a 1, 2 o 3 grupos aleatoriamente
            $numGroups = rand(1, 3);

            $possibleGroups = [$beginnerGroup->id, $intermediateGroup->id, $advancedGroup->id];
            shuffle($possibleGroups);

            for ($i = 0; $i < $numGroups; $i++) {
                $randomGroups[] = $possibleGroups[$i];
            }

            $course->groups()->attach($randomGroups);
        });
    }
}
