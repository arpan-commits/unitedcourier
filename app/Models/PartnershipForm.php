<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipForm extends Model
{
    protected $table = 'partnership_forms';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'message',
        'ip_address',
    ];
}
