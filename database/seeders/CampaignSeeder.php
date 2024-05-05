<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaigns = [
            [
                'id_sekolah' => 1,
                'nama_campaign' => 'Perbaikan Perpustakaan',
                'deskripsi_campaign' => 'Kondisi perpustakaan yang sudah sangat rapuh dan bantuan buku bacaan untuk siswa',
                'status' => 'Menunggu Verifikasi',
                'catatan_campaign' => ' ',
                'tanggal_dibuat' => '2024-04-01',
                'tanggal_selesai' => null,
                'foto'=>'perpustakaan.jpg',
            ],
            [
                'id_sekolah' => 1,
                'nama_campaign' => 'Fasilitas Pembelajaran Siswa',
                'deskripsi_campaign' => 'Bantuan alat pendukung pembelajaran bagi siswa, banyak siswa kami yang kurang mampu',
                'status' => 'Sedang Berjalan',
                'catatan_campaign' => 'Bisa diperjelas fasilitas yang diminta',
                'tanggal_dibuat' => '2024-02-01',
                'tanggal_selesai' => null,
                'foto'=>'fasilitas.jpeg',
            ],
            [
                'id_sekolah' => 1,
                'nama_campaign' => 'Perbaikan Ruang Kelas',
                'deskripsi_campaign' => 'Ruang kelas tidak nyaman dan aman digunakan untuk belajar, bantu kami perbaiki kerusakan',
                'status' => 'Ditolak',
                'catatan_campaign' => 'Jumlah yang diminta terlalu besar',
                'tanggal_dibuat' => '2024-03-01',
                'tanggal_selesai' => null,
                'foto'=>'perbaikan_ruang_belajar.jpg',
            ],
            [
                'id_sekolah' => 1,
                'nama_campaign' => 'Bantuan Alat Tulis Untuk Siswa',
                'deskripsi_campaign' => 'Banyak siswa kami belum  memiliki alat tulis untuk proses belajar yang layak dan masih banyak yang tidak mempunyai alat tulis',
                'status' => 'Sedang Berjalan',
                'catatan_campaign' => '',
                'tanggal_dibuat' => '2024-01-01',
                'tanggal_selesai' => null,
                'foto'=>'alat_tulis.jpg',
            ]
        ];

        foreach ($campaigns as $campaign) {
            Campaign::create($campaign);
        }
    }
}
