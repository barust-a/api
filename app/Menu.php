<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'resto_id', 'name', 'description', 'price'
    ];
}
