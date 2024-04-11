<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInventory extends Model
{
    protected $table = 'stockinventory';
        protected $primaryKey = 'Product_id';

    protected $fillable = [
        'ProductName',
        'Quantity',
        'Price',
    ];
    use HasFactory;

}
