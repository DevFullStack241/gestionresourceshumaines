<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'start_time',
        'end_time',
        'status',
    ];

    // Relations

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
