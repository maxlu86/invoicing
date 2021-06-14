<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [

    'type',
    'user_company_id',
    'client_id',
    'email',
    'issue_date',
    'expiring_date',
    'serial_number',
    'payment_method',
    'note',
    'subtotal',

    ];
}
