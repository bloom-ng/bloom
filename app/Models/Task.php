<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class Task extends Model
{
    use HasFactory;

    public function personnel(){
        return $this->belongsTo(Personnel::class);
    }
}
