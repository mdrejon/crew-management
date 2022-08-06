<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crew_immigration_document extends Model
{
    use HasFactory;
    protected $fillable = array(
        'crew_id',
        'document_title',
        'issue_at',
        'issue_date',
        'expiry_date',
        'updated_at',
    );
}
