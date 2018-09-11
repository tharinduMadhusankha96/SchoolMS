<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class labs extends Model
{
    protected $table = 'labs';

    public $primaryKey = 'productID';
    public $timestamps = true;
}
