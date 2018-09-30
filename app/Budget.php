<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use \Illuminate\Auth\Authenticatable;

    protected $table ='budgets';
    protected $primaryKey = 'Bid';
    protected $fillable = ['TypeandYear','Year','ExpectedAmount'];
}
