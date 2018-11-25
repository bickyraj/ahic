<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCheckList extends Model
{
 protected $fillable=['application_form_id','completed_all_form','enclosed_certified_passport_and_visa','enclosed_qualification','enclosed_english_lang_proficiency','enclosed_certified_documents','read_ticked_declaration'];
}
