<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationRest extends Model
{
    use HasFactory;
    protected $fillable=['application_id','update_start_time','update_finish_time'];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
