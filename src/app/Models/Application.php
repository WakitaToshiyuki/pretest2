<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable=['user_id','Work_id','update_start_time','update_finish_time','reason'];

    public function application_rests(){
        return $this->hasMany(ApplicationRest::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function work(){
        return $this->belongsTo(Work::class);
    }

    public function rests(){
        return $this->belongsToMany(Rest::class);
    }
}
