<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funds extends Model
{
    use \Illuminate\Auth\Authenticatable;

    protected $table ='funds';
    protected $primaryKey = 'FundNo';
    protected $fillable = ['FundNameMonthYear','Donor','MonthYear','Year','ReceivedDate','ReceivedType','Amount'];
}
