<?php

namespace App;

use Models\Lists\ListAccountType;
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

    public function accountType()
    {
        return $this->hasOne('App\Models\Lists\ListAccountType', 'id_account_type', 'id_account_type')->first();
    }

    public function group()
    {
        return "";
    }

    public function cellPhone()
    {
        return "";
    }

    public function getInfo()
    {
        switch ($this->id_account_type)
        {
            case 1:
            {

            } break;
            case 2:
            {

            } break;
            case 3:
            {
                return $this->hasOne('App\Models\Accounts\IEPStudent', 'id_student', 'id_account')->first();
            } break;
            case 4:
            {

            } break;
            case 5:
            {
                
            } break;
            case 6:
            {

            } break;
        }
    }

}
