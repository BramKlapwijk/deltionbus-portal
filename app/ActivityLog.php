<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'activity',
        'application_user_id'
    ];

    public function application_user()
    {
        return $this->belongsTo('App\ApplicationUsers');
    }
}
