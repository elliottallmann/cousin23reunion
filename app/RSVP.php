<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RSVP extends Model
{
    protected $table = "rsvps";
    protected $eventId = "eventId";

    public function user()
    {
        return $this->hasMany('App\User', "id", "userId");
    }

    public function event()
    {
        return $this->belongsTo('App\Event', "id");
    }
}
