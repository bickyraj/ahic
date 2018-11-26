<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantPassport extends Model
{
    protected $fillable=[
        'application_form_id','nationality','number','issued_date','expired_date','place_of_issue'
    ];
}
