<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    private $info;
	
    protected $fillable = [
        'second_name', 'first_name', 'patronymic', 'email', 'password', 'id_type_user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function typeUser()
    {
        return $this->hasOne('App\TypeUser', 'id_type_user', 'id_type_user')->first()->caption;
    }

    public function getInfo()
    {
        switch ($this->id_type_user) {
            case 1:
            {

            } break;
            case 2:
            {
                return $this->hasOne('App\Models\TeacherInfo', 'id_teacher', 'id')->first();
            } break;
            case 3:
            {

            } break;
            case 4:
            {

            } break;
        }

    }
}
