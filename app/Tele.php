<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tele extends Model
{
    use \Illuminate\Auth\Authenticatable;

    protected $table ='teles';
    protected $primaryKey = 'Tid';
    protected $fillable = ['MonthYear','Year','Place','PaymentMethod','Amount','PaidDate'];
}
