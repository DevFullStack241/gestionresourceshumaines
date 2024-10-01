<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quota_horaire',
        'qualifications',
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
