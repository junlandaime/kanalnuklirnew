<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject_id',
        'person_id'
    ];
}
