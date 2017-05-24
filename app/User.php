<?php

namespace alecrim;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getPermissionAttribute($value) {
        
        if ($value === 1) {
            return "Administrador";
        }elseif ($value ===  2) {
            return "Gerente";
        }elseif ($value ===  3) {
            return "Funcionário";
        }

        return "Não cadastrado";

    }


}
