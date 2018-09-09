<?php

namespace App;

use App\Http\Controllers\SocietyController;
use Illuminate\Database\Eloquent\Model;

class SocietyUser extends Model
{
    protected $fillable =['user_id' , 'society_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function society()
    {
        return $this->belongsTo(Society::class);
    }
}
