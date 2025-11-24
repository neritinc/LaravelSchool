<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'diakNev', 'schoolclassId', 'neme', 'iranyitoszam', 
        'lakHelyseg', 'lakCim', 'szulHelyseg', 'szulDatum', 
        'igazolvanyszam', 'atlag', 'osztondij'
    ];

    // 1. Diák -> Osztály kapcsolat (Egy osztálya van)
    public function schoolClass()
    {
        // Megmondjuk, hogy a 'schoolclassId' oszlopon keresztül kapcsolódjon
        return $this->belongsTo(SchoolClass::class, 'schoolclassId', 'id');
    }

    // 2. Diák -> Sportok kapcsolat (Több sportja lehet)
    public function sports()
    {
        return $this->belongsToMany(
            Sport::class, 
            'playingsports', // Kapcsolótábla neve
            'studentId',     // Saját kulcs a kapcsolótáblában
            'sportId'        // Célkulcs a kapcsolótáblában
        )->withTimestamps();
    }
}