<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Target;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $targets = [
            [
                'id_campaign' => 1,
                'nama_barang' => 'Buku Bacaan',
                'jumlah_barang' => 50,
            ],
            [
                'id_campaign' => 1,
                'nama_barang' => 'Uang',
                'jumlah_barang' => 5000000,
            ],
            [
                'id_campaign' => 2,
                'nama_barang' => 'Proyektor',
                'jumlah_barang' => 5,
            ],
            [
                'id_campaign' => 2,
                'nama_barang' => 'Uang',
                'jumlah_barang' => 2000000,
            ],
            [
                'id_campaign' => 3,
                'nama_barang' => 'Uang',
                'jumlah_barang' => 200000000,
            ],
            [
                'id_campaign' => 4,
                'nama_barang' => 'Uang',
                'jumlah_barang' => 10000000,
            ]
        ];

        foreach ($targets as $target) {
            Target::create($target);
        }
    }
}
