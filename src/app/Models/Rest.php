<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $fillable=['work_id','start_time','finish_time'];

    public function work(){
        return $this->belongsTo(Work::class);
    }

    public function applications(){
        return $this->belongsToMany(Application::class);
    }
}
