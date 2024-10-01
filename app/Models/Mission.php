<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date_debut',
        'date_fin',
        'client_id',
        'responsable_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    public function postes()
    {
        return $this->belongsToMany(Poste::class, 'mission_poste');
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function chat()
    {
        return $this->hasOne(Chat::class);
    }
}
