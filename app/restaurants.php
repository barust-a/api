<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurants extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'localisation', 'rate', 'phone', 'openTime', 'closeTime'
    ];
}
