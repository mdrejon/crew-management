<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_geo_information extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'date_of_record',
        'ship_area',
        'source',
    );
}
