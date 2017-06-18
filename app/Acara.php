<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';
    protected $primaryKey = 'id_acara';
    public $timestamps = true;
    public $incrementing = false;
}
