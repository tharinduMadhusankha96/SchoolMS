<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryExpenses extends Model
{
    protected $table = 'inventoryexpenses';
    public $primaryKey = 'invoiceID';
    public $timestamps = true;
}
