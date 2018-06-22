<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'id_feedback';
    protected $table = 'IEPFeedback';
    public $timestamps = false;
    
    protected $fillable = [
        'second_name',
        'first_name',
        'patronymic',
        'email',
        'id_feedback_type',
        'subject',
        'content'
    ];

}
