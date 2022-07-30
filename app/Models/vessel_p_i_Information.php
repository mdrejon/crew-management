<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_p_i_Information extends Model
{
    use HasFactory;
    protected $fillable = array(
        'vessel_id',
        'title',
        'inception',
    );
}
