<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blackout extends Model
{
    public $timestamps = false;
    protected $guarded = []; //guarded es cuando quieres que todos los campos sean asignables

    public function zona()
    {
        return $this->belongsTo('App\Zona');
    }
}
