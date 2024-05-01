<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function people()
    {
        return $this->belongsToMany(Person::class, 'subject_people');
    }
}
