<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'mobils';
    protected $fillable = [
        'kode',
        'nama_mobil',
        'warna',
        'nopol',
        'harga_sewa',
        'status',
        'photos',
        'view',
    ];
}