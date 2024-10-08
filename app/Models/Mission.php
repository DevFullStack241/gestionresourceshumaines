<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'responsable_id',
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'status',
    ];

    // Utilisation de $casts pour s'assurer que start_date et end_date sont toujours des objets Carbon
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    //relations

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }



    public function getStartDateFormattedAttribute()
    {
        return $this->start_date ? $this->start_date->format('Y-m-d\TH:i') : null;
    }

    /**
     * Accesseur pour formater end_date
     */
    public function getEndDateFormattedAttribute()
    {
        return $this->end_date ? $this->end_date->format('Y-m-d\TH:i') : null;
    }
}
