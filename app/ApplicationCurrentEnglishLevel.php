<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCurrentEnglishLevel extends Model
{
    protected $fillable=['application_form_id','english_first_lang','english_lang_test','score_achieved','year_taken','listening','reading','writing','speaking','total_score'];
    //
}
