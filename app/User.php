<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pai()
    {
        return $this->belongsTo(self::class, 'pai_id');
    }

    public function filhos(){
        return $this->hasMany(self::class, 'pai_id')->where('id', '!=', $this->id)->orderBy('name');
    }

    public function usertype()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function isAdmin(): bool {
        return $this->usertype->name == 'administrador' ? true : false;
    }

    public function isCliente(): bool {
        return $this->usertype->name == 'cliente' ? true : false;
    }

    public function isRevendedor(): bool {
        return $this->usertype->name == 'revendedor' ? true : false;
    }

    public function isRevendedorMaster(): bool {
        return $this->usertype->name == 'revendedor master' ? true : false;
    }

}
