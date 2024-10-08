<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'title',
        'creation_date',
    ];

    // Relations
    public function missions()
    {
        return $this->belongsTo(Mission::class);
    }
}
