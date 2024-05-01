<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'prename',
        'name',
        'slug',
        'postname',
        'sinta',
        's1',
        's2',
        's3',
        'email',
        'jabatan',
        'fungsional',
        'project',
        'publication',
        'hki',
        'foto',
        'status',
        'user_id'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_people');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
