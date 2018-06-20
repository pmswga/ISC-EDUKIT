<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Model;

class ListRelationType extends Model
{
    protected $table = 'ListRelationType';
    protected $primaryKey = 'id_relation_type';
    public $timestamps = false;
}
