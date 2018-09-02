<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Event;

class Comment extends Model
{
    protected $fillable = ['body', 'event_id' , 'user_id',];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//udfnpowiefpwoeivnpo
}
