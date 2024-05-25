<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'phone',
        'entite_id',
    ];

    public function entite()
    {
        return $this->belongsTo(Entite::class);
    }

    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
