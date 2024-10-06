<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuartTravail extends Model
{
    use HasFactory;
    protected $fillable = [
        'affectation_id',
        'start_time',
        'end_time',
        'work_hours',
    ];

    // Relations
    public function affectation()
    {
        return $this->belongsTo(Affectation::class);
    }
}
