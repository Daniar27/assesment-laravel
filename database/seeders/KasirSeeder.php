<?php

namespace Database\Seeders;

use App\Models\Kasir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kasirs = [
            [
                'nama_kasir' => 'Kasir 1',
                'kode_kasir' => 'K001',
                'no_hp' => '0123456789',
            ],
            [
                'nama_kasir' => 'Kasir 2',
                'kode_kasir' => 'K002',
                'no_hp' => '09876543231',
            ],
            // Add more sample data as needed
        ];

        // Insert data into the 'tenants' table
        foreach ($kasirs as $kasirData) {
            Kasir::create($kasirData);
        }
    }
}
