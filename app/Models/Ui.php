<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ui extends Model
{
    use HasFactory;
    protected $table = 'rentmobils';
    protected $fillable = [
        'kode',
        'ktp',
        'nama',
        'nik',
        'no_telp',
        'tgl_sewa',
        'tgl_kembali',
        'faktur',
        'total_pembayaran',
        'total_dp',
        'hari',
        'status',
        'bukti',
        'rk',
        'role_id',
    ];
}