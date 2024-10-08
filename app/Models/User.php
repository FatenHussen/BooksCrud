<?php 
namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Get the identifier that will be stored in the JWT token
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Return a key value array, containing any custom claims to be added to the JWT token
    public function getJWTCustomClaims()
    {
        return [];
    }
}
