<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
