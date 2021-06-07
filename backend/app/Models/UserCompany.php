<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
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
        'web_page',
        'logo'         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
