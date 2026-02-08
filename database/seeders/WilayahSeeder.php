<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\datWilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama
        datWilayah::truncate();

        // Data wilayah di Riau
        $wilayahs = [
            'Pekanbaru',
            'Kampar',
            'Rokan Hilir',
            'Rokan Hulu',
            'Siak',
            'Indragiri Hilir',
            'Indragiri Hulu',
            'Kuantan Singingi',
            'Pelalawan',
            'Bengkalis',
        ];

        foreach ($wilayahs as $wilayah) {
            datWilayah::create([
                'namaWilayah' => $wilayah,
            ]);
        }
    }
}
