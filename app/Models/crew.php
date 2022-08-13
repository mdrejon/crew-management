<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crew extends Model
{
    use HasFactory;
    protected $fillable = array(
        'id_no',
        'sign_in',
        'sign_out',
        'vessel_id',
        'last_name',
        'given_name',
        'full_name',
        'img',
        'place_of_birth',
        'date_of_birth',
        'height',
        'weight',
        'boiler_suit',
        'safety_shoes',
        'marital_status',
        'mobile_no',
        'nationality',
        'hair_color',
        'eyes_color',
        'sid_no',
        'nid_no',
        'religion',
        'covid_vaccination',
        'address',
        'email',
        'next_of_kin',
        'relationship',
        'family_phone_no',
        'address_next_of_kin',
        'status',
        'order',
    );
}
