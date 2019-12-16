<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentAgreementProcess extends Model
{
    protected $fillable=[
        'agent_id','sent_date','agreement','received_date','signed','agent_document_id'
    ];
}
