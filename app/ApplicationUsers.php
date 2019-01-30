<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationUsers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'app_key',
    ];
}
