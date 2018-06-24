<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Model;

class ListFeedbackType extends Model
{
    protected $table = 'ListFeedbackType';
    protected $primaryKey = 'id_feedback_day';
    public $timestamps = false;
}
