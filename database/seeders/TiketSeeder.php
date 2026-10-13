<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tikets')->delete();

        $data = [
            ['nama' => 'Garuda Indonesia', 'jenis' => 'Pesawat', 'asal' => 'Surabaya', 'tujuan' => 'Jakarta', 'berangkat' => '08:00', 'tiba' => '09:35', 'harga' => 1250000, 'durasi' => 95],
            ['nama' => 'Citilink', 'jenis' => 'Pesawat', 'asal' => 'Surabaya', 'tujuan' => 'Jakarta', 'berangkat' => '10:00', 'tiba' => '11:40', 'harga' => 850000, 'durasi' => 100],
            ['nama' => 'Lion Air', 'jenis' => 'Pesawat', 'asal' => 'Jakarta', 'tujuan' => 'Bali', 'berangkat' => '07:00', 'tiba' => '09:00', 'harga' => 950000, 'durasi' => 120],
            ['nama' => 'Batik Air', 'jenis' => 'Pesawat', 'asal' => 'Yogyakarta', 'tujuan' => 'Jakarta', 'berangkat' => '13:00', 'tiba' => '14:15', 'harga' => 780000, 'durasi' => 75],
            ['nama' => 'Super Air Jet', 'jenis' => 'Pesawat', 'asal' => 'Surabaya', 'tujuan' => 'Bali', 'berangkat' => '15:00', 'tiba' => '16:00', 'harga' => 650000, 'durasi' => 60],

            ['nama' => 'Argo Bromo Anggrek', 'jenis' => 'Kereta', 'asal' => 'Surabaya', 'tujuan' => 'Jakarta', 'berangkat' => '08:00', 'tiba' => '17:00', 'harga' => 650000, 'durasi' => 540],
            ['nama' => 'Kereta Airlangga', 'jenis' => 'Kereta', 'asal' => 'Surabaya', 'tujuan' => 'Jakarta', 'berangkat' => '09:00', 'tiba' => '20:00', 'harga' => 250000, 'durasi' => 660],
            ['nama' => 'Kereta Mutiara Timur', 'jenis' => 'Kereta', 'asal' => 'Surabaya', 'tujuan' => 'Banyuwangi', 'berangkat' => '22:00', 'tiba' => '05:00', 'harga' => 200000, 'durasi' => 420],
            ['nama' => 'Kereta Taksaka', 'jenis' => 'Kereta', 'asal' => 'Yogyakarta', 'tujuan' => 'Jakarta', 'berangkat' => '08:30', 'tiba' => '15:30', 'harga' => 450000, 'durasi' => 420],
            ['nama' => 'Kereta Malabar', 'jenis' => 'Kereta', 'asal' => 'Bandung', 'tujuan' => 'Malang', 'berangkat' => '16:00', 'tiba' => '08:00', 'harga' => 400000, 'durasi' => 960],

            ['nama' => 'Harapan Jaya', 'jenis' => 'Bus', 'asal' => 'Surabaya', 'tujuan' => 'Malang', 'berangkat' => '08:00', 'tiba' => '11:00', 'harga' => 100000, 'durasi' => 180],
            ['nama' => 'Sinar Jaya', 'jenis' => 'Bus', 'asal' => 'Jakarta', 'tujuan' => 'Yogyakarta', 'berangkat' => '19:00', 'tiba' => '06:00', 'harga' => 220000, 'durasi' => 660],
            ['nama' => 'Rosalia Indah', 'jenis' => 'Bus', 'asal' => 'Surabaya', 'tujuan' => 'Jakarta', 'berangkat' => '17:00', 'tiba' => '05:00', 'harga' => 350000, 'durasi' => 720],
            ['nama' => 'Sugeng Rahayu', 'jenis' => 'Bus', 'asal' => 'Surabaya', 'tujuan' => 'Yogyakarta', 'berangkat' => '07:00', 'tiba' => '13:00', 'harga' => 150000, 'durasi' => 360],
            ['nama' => 'PO Pahala Kencana', 'jenis' => 'Bus', 'asal' => 'Bandung', 'tujuan' => 'Jakarta', 'berangkat' => '09:00', 'tiba' => '13:00', 'harga' => 120000, 'durasi' => 240],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        unset($item);

        DB::table('tikets')->insert($data);
    }
}