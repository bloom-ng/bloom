<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Task;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','designation','job_description','slug','featured'];

    protected $with =['user:id,name,email,avatar'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
