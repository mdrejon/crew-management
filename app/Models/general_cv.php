<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class general_cv extends Model
{
    use HasFactory;
    protected $fillable = array(
        'crew_id',
        'position_applied',
        'for_vessel',
        'application_date',
        'available_date',
        'manning_agent',
        'signature_of_applicant',
        'signature_date',
        'interview_by',
        'interview_date',
        'department',
        'update_by',
        'updated_at',
        'status',
        'order',
    );
}
