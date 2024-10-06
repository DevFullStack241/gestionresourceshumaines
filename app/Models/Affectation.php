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
        'assignment_date',
        'status',
    ];

    //relation

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function quartTravail()
    {
        return $this->hasMany(QuartTravail::class);
    }
}
