<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar_Confirmation extends Model
{
    protected $table = 'calendar_confirmation';
    protected $primaryKey = 'token';
    public $timestamps = false;
    public $incrementing = false;
    protected $dates = [
        'expired_at'
    ];
}
