<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Empresa;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name','email', 'password', 'confirmation_code', 'confirmed',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function empresa() {
        return $this->hasMany(Empresa::class, 'id_user');
        
    }

}
