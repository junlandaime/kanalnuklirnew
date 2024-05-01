<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'syllabus',
        'code',
        'sks',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_courses');
    }
}
