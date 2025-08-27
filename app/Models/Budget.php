<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'business_name',
        'account_name',
        'amount',
        'month',
        'year',
    ];
}
