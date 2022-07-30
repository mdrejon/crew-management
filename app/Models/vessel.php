<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_name',
        'imo_no',
        'flag_img',
        'country_name',
        'call_sign',
        'mmsi',
        'dwt',
        'type_of_ship',
        'year_of_build',
        'international_labour_organization',
        'lnternational_transport',
        'status',
        'order',
        'create_by',
        'update_by',
    );
}
