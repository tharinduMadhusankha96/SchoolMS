<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Sport extends Model
{
    protected $fillable = [
        'id','name','description','user_id','image','gender','practice_on'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}



