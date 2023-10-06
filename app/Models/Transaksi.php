<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        "sales_id",
        "obat_id",
        "pelanggan_id",
        "total_obat",
        "total_bayar"
    ];
}
