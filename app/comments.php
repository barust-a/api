<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $fillable = [
        'id_user', 'id_resto', 'comment', 'rate'
    ];
}