<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = ['sportNev'];

    // Sport -> Diákok kapcsolat (Többen űzhetik)
    public function students()
    {
        return $this->belongsToMany(
            Student::class, 
            'playingsports', // Kapcsolótábla neve
            'sportId',       // Saját kulcs a kapcsolótáblában
            'studentId'      // Célkulcs a kapcsolótáblában
        )->withTimestamps();
    }
}