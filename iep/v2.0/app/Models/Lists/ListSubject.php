<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Model;

class ListSubject extends Model
{
    protected $table = 'ListSubject';
    protected $primaryKey = 'id_subject';
    public $timestamps = false;

    protected $fillable = [
        'description',
    ];

}
