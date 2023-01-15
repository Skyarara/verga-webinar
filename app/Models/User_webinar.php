<?php

namespace App\Models;

use App\Models\Webinar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User_webinar extends Model
{
    use HasFactory;

    protected $guarded = [""];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id', 'id');
    }
}
