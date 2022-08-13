<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $fillable = array(
        'certificate_type',
        'certificate_title',
        'status',
        'order',
        'update_by',
        'updated_at',
    );
}
