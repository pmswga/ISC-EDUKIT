<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Model;

class ListEducationUnit extends Model
{
    protected $table = 'ListEducationUnit';
    protected $primaryKey = 'id_education_unit';
    public $timestamps = false;

    protected $fillable = [
        'id_education_form',
        'number',
    ];

}
