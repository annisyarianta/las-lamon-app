<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogues')->insert([
            [
                'name' => 'Single Package',
                'mini_description' => 'Donate 1, 3, or 8 tree seedlings.',
                'description' => 'A simple donation package for individuals who want to contribute to reforestation.',
                'image_url' => 'assets/img/single.png',
                'price' => 0,
                'output' => 'Regular E-Certificate',
                'target' => 'Individuals and Students',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mini Forest Package',
                'mini_description' => 'Development of one forest block covering 200 m2 with dense planting.',
                'description' => 'A medium-scale reforestation package for communities and companies.',
                'image_url' => 'assets/img/mini-forest.png',
                'price' => 10000000,
                'output' => 'Physical Name Board & Special Dashboard',
                'target' => 'Companies (CSR) & Communities',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Special Package',
                'mini_description' => 'Watershed (DAS) enrichment and conservation collaboration.',
                'description' => 'A special collaboration package with customizable reports and requirements.',
                'image_url' => 'assets/img/paket-khusus.png',
                'price' => 0,
                'output' => 'Custom Collaboration Report',
                'target' => 'NGOs, Institutions, & External Collaborations',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
