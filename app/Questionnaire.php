<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];
    public function questionnaire_details()
    {
        return $this->hasMany('App\QuestionnaireDetail');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
