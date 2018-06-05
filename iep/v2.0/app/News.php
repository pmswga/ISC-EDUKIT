<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'id_author', 'publication_date'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'id_author')->first();
    }

}
