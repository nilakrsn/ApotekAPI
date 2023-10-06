<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Sales;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pelanggan::create([
            "nama_plg" => "naila",
            "no_telp_plg" => "08123456789",
            "alamat_plg" => "condet" 
        ]);

        Pelanggan::create([
            "nama_plg" => "zahrah",
            "no_telp_plg" => "08123456788",
            "alamat_plg" => "cawang uki" 
        ]);

        Sales::create([
            "nama_sales" => "syahnas",
            "no_telp_sales" => "081298765432",
            "alamat_sales" => "ciracas"
        ]);
        Sales::create([
            "nama_sales" => "nila",
            "no_telp_sales" => "081298765422",
            "alamat_sales" => "cibubur"
        ]);

        Obat::create([
            "nama_obat" => "paracetamol",
            "pembuat_obat" => "darya-varia",
            "stok" => 100,
            "harga" => 10000,
            "tgl_kadaluarsa" => "2023-10-06"
        ]);

        Obat::create([
            "nama_obat" => "panadol",
            "pembuat_obat" => "sterling-indonesia",
            "stok" => 10,
            "harga" => 12000,
            "tgl_kadaluarsa" => "2023-10-11"
        ]);

        Transaksi::create([
            "sales_id" => 1,
            "obat_id" => 2,
            "pelanggan_id" => 1,
            "total_obat" => 2,
            "total_bayar" =>20000
        ]);
    }
}
