<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //

    public function application_user()
    {
        return $this->belongsTo('App\ApplicationUsers');
    }
}
