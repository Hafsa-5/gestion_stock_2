<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_demande',
        'statut',
        'agent_id',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
