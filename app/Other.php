<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    use \Illuminate\Auth\Authenticatable;
    protected $table ='others';
    protected $primaryKey = 'Oid';
    protected $fillable = ['MonthYear','Purpose','Company','PaymentMethod','Amount','PaidDate'];
}
