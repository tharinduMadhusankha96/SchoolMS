<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportUser extends Model
{
    protected $fillable =['user_id' , 'sport_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
