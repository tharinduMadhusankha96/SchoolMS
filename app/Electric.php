<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
    use \Illuminate\Auth\Authenticatable;

    protected $table ='electrics';
    protected $primaryKey = 'Eid';
    protected $fillable = ['MonthYear','Year','Place','PaymentMethod','Amount','PaidDate'];
}
