<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix_unitaire',
        'quantite_stock',
        'contrat_id',
        'demande_id',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
