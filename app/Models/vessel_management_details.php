<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_management_details extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'name_of_company',
        'imo_number',
        'role',
        'address',
        'date_of_effect',
        'status',
        'order',
    );
}
