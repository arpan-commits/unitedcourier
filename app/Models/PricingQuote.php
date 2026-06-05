<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingQuote extends Model
{
    protected $table = 'pricing_quotes';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'origin',
        'destination',
        'business_category',
        'monthly_volume',
        'ip_address',
    ];
}
