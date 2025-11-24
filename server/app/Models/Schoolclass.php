<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'schoolclasses'; // Biztos ami biztos

    // Egy osztálynak sok diákja van
    public function students()
    {
        return $this->hasMany(Student::class, 'schoolclassId', 'id');
    }
}