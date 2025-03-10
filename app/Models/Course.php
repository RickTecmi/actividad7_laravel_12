<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Agregar este import
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // Agregar esta línea

    protected $fillable = ['key', 'title', 'content', 'robotics_kit_id'];

    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
