<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_safety_certificate extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'classification_society',
        'date_survey',
        'date_expiry',
        'date_change_status',
        'reason',
        'top_c_v',
    );
}
