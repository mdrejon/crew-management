<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_classification extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'title',
        'status',
        'since',
        'survey_title',
        'last_renewal_survey',
        'next_renewal_survey',
    );
}
