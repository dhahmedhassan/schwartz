<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireDetail extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }
}
