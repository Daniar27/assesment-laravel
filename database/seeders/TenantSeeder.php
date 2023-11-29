<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for Tenant model
        $tenants = [
            [
                'nama_tenant' => 'Tenant 1',
                'kode_tenant' => 'T001',
                'no_hp' => '0123456789',
            ],
            [
                'nama_tenant' => 'Tenant 2',
                'kode_tenant' => 'T002',
                'no_hp' => '0987654321',
            ],
            // Add more sample data as needed
        ];

        // Insert data into the 'tenants' table
        foreach ($tenants as $tenantData) {
            Tenant::create($tenantData);
        }
    }
}
