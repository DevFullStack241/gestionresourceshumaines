<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'legal_name',
        'email',
        'phone',
        'address',
        'additional_information',
    ];

    //relation
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
