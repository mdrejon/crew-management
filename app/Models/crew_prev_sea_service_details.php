<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crew_prev_sea_service_details extends Model
{
    use HasFactory;
    protected $fillable = array(
        'crew_id',
        'rank',
        'vessel_id',
        'grt',
        'nrt',
        'period_of_service',
        'sign_on',
        'sign_off',
        'duration',
        'reason_for_sign',
        'updated_at',
    );
}
