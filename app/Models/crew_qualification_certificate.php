<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crew_qualification_certificate extends Model
{
    use HasFactory;
    protected $fillable = array(
        'crew_id',
        'certificate_id',
        'certificate_type',
        'cert_no',
        'issue_date',
        'expiry_date',
        'issued_by',
        'sign_off',
        'updated_at',
    );
}
