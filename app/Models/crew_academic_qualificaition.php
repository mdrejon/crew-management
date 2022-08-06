<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crew_academic_qualificaition extends Model
{
    use HasFactory;
    protected $fillable = array(
        'crew_id',
        'from',
        'to',
        'institutions',
        'qualifications',
        'updated_at',
    );
}
