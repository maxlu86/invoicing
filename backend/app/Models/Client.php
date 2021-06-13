<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [

        'company_type',          
        'name',
        'id_number',
        'display_name',
        'vat_number',
        'email',
        'phone',
        'street_1',
        'street_2',
        'zip_code',
        'city',
        'state',
        'country',
        'internal_notes',
        'web_page',
        'payment_method',
        'sales_account',
        'purchase_account',
        'reference',
        'due_date',
        'discount',
        'payment_day',
        'sales_tax',
        'purchase_tax',
    ];
}
