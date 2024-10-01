<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
