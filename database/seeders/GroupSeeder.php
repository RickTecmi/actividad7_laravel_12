<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run()
    {
        Group::create([
            'name' => 'principiante',
            'description' => 'Grupo para estudiantes sin experiencia previa'
        ]);

        Group::create([
            'name' => 'intermedio',
            'description' => 'Grupo para estudiantes con conocimientos básicos'
        ]);

        Group::create([
            'name' => 'avanzado',
            'description' => 'Grupo para estudiantes con experiencia'
        ]);
    }
}
