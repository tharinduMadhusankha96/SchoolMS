<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sports extends Model
{
    protected $table = 'sports';

    public $primaryKey = 'productID';
    public $timestamps =true;
}
