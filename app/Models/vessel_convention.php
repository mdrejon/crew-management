<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_convention extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'convention',
        'status',
    );
}
