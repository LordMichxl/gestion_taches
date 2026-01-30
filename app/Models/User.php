<?php

namespace App\Models;

 
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable 
{

    use HasFactory, Notifiable; // Traits pour la génération de données et les notifications

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // Champs pouvant être remplis lors de l'inscription ou modification
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    // Champs cachés lors de la sérialisation (ex : API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * voir les attributs qui doivent être convertis.
     *
     * @return array<string, string>
     */
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
