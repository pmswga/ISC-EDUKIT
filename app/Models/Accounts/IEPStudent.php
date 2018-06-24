<?php

namespace App\Models\Accounts;

use App\IEPAccount;

use Illuminate\Database\Eloquent\Model;

class IEPStudent extends Model
{
    protected $table = 'IEPStudent';
    protected $primaryKey = '';
    public $timestamps = false;

    protected $fillable = [
        'id_student',
        'id_group',
        'id_education_pay_form',
        'cell_phone'
    ];

    public function getInfo()
    {
        return $this->hasOne('App\IEPAccount', 'id_account', 'id_student')->first();
    }

    public function getGroup()
    {
        
    }


}
