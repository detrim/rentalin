<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodepayment extends Model
{
    use HasFactory;
    protected $table = 'metodepayments';
    protected $fillable = [
        'rk',
        'faktur',
    ];
}
