<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
