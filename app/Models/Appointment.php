<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_id','requester_name','requester_email','requester_phone','start','duration','end'];

    //protected $with = ['personnel'];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
