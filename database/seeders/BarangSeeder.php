<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for Barang model
        $barangs = [
            [
                'nama_barang' => 'Nasi Ayam',
                'kode_barang' => 'B001',
                'satuan' => 'PCS',
                'harga_satuan' => 10000,
                'stok' => 100,
                'tenant_id' => 1
            ],
            [
                'nama_barang' => 'Ayam Box',
                'kode_barang' => 'B002',
                'satuan' => 'BOX',
                'harga_satuan' => 12000,
                'stok' => 50,
                'tenant_id' => 2
            ],
            // Add more sample data as needed
        ];

        // Insert data into the 'barangs' table
        foreach ($barangs as $barangData) {
            Barang::create($barangData);
        }
    }
}
