<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'phone',
        'email',
        'password',
        'statut_utilisateur_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statutUtilisateur(){
        return $this->belongsTo(StatutUtilisateur::class, 'statut_utilisateur_id', 'id');
    }

    public function reclamations(){
        return $this->hasMany(Reclamation::class, 'utilisateur_id', 'id');
    }

    public function coproprietes(){
        return $this->hasMany(Copropriete::class, 'coproprietaire_id', 'id');
    }

    public function resolutions(){
        return $this->hasMany(Resolution::class, 'utilisateur_id', 'id');
    }
}
