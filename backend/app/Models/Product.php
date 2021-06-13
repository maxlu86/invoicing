<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',            
        'sku',
        'description',
        'sales_account',
        'sales_tax',
        'unit_price',
        'total',
        'barcode',
        'factory_code',
        'weight',
        'product_quantity',
        'client_id',
        'purchase_tax',
        'unit_cost',
    ];
}
