<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stationary extends Model
{
    protected $table = 'stationaries';
    public $primaryKey = 'productID';
    public $timestamps = true;
}
