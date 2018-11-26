<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAddressInAustralia extends Model
{
    protected $fillable=['application_form_id','street','city','province','country','telephone','email','postcode'];
}
