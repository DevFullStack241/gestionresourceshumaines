<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'agent_id',
        'poste_id',
        'quart_de_travail_id',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function quartDeTravail()
    {
        return $this->belongsTo(QuartDeTravail::class);
    }
}
