<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onboarding extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_with',
        'requester_name',
        'requester_email',
        'requester_phone',
        'date',
        'meeting_duration',
        'additional_info'
    ];
}
