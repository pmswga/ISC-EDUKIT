<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Model;

class ListGroup extends Model
{
    protected $table = 'ListGroup';
    protected $primaryKey = 'id_group';
    public $timestamps = false;

    protected $fillable = [
        'id_specialty',
        'id_education_unit',
        'caption',
        'education_year_start',
        'education_year_end'
    ];

    

}
