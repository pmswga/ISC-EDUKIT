<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class IEPAccount extends Authenticatable
{
    use Notifiable;

    protected $table = 'IEPAccount';
    protected $primaryKey = 'id_account';
    public $timestamps = false;
    
    protected $fillable = [
        'second_name',
        'first_name',
        'patronymic',
        'email',
        'password',
        'id_account_type'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group()
    {
        return "";
    }

    public function cellPhone()
    {
        return "";
    }

}
