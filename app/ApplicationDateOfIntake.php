<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDateOfIntake extends Model
{
      protected $fillable=[
        'year','date','end_date','duration','holiday_start','holiday_end','holiday_duration','credential_release','term','mid_term'
    ];
}
