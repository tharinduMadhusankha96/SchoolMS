<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use \Illuminate\Auth\Authenticatable;

    protected $table ='waters';
    protected $primaryKey = 'id';
    protected $fillable = ['MonthYear','Place','PaymentMethod','Amount','PaidDate'];
}
