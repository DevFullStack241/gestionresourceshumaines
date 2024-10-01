<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuartDeTravail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'heure_debut',
        'heure_fin',
    ];

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
