<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campaigns')->insert([
            'id' => 1,
            'id_sekolah' => 1,
            'nama_campaign' => 'Perbaikan Perpustakaan',
            'deskripsi_campaign' => 'Kondisi kelas yang sudah sangat rapuh dan bantuan buku bacaan untuk siswa',
            'jenis_donasi' => 'uang',
            'status' => 'valid',
            'catatan_campaign' => ' ',
            'tanggal_selesai' => '2024-12-12',
    ]);

        DB::table('campaigns')->insert([
            'id' => 2,
            'id_sekolah' => 1,
            'nama_campaign' => 'Perbaikan Ruang Kepala Sekolah',
            'deskripsi_campaign' => 'Kondisi kelas yang sudah sangat rapuh dan bantuan buku bacaan untuk siswa',
            'jenis_donasi' => 'barang',
            'status' => 'valid',
            'catatan_campaign' => ' ',
            'tanggal_selesai' => '2024-12-12',
    ]);

    }
}
