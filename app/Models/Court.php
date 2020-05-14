<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    /** @inheritdoc */
    protected $fillable = [
        'name',
        'address',
        'state'
    ];
}
