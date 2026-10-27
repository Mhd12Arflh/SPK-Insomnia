<?php

namespace Database\Seeders;

use App\Models\TingkatInsomnia;
use Illuminate\Database\Seeder;

class TingkatInsomniaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode' => 'P01',
                'nama' => 'Ringan',
                'nilai_min' => 0.20,
                'nilai_max' => 0.40,
                'persentase_min' => 20.00,
                'persentase_max' => 40.00,
                'saran' => 'Terapkan sleep hygiene sederhana: jaga jam tidur yang konsisten, kurangi paparan layar sebelum tidur, dan hindari kafein di malam hari. Gangguan masih tergolong ringan dan umumnya dapat membaik dengan perbaikan kebiasaan tidur.',
            ],
            [
                'kode' => 'P02',
                'nama' => 'Sedang',
                'nilai_min' => 0.41,
                'nilai_max' => 0.80,
                'persentase_min' => 41.00,
                'persentase_max' => 80.00,
                'saran' => 'Disarankan mulai memperbaiki pola tidur secara disiplin dan mempertimbangkan konsultasi dengan tenaga kesehatan atau psikolog apabila gejala terus berlanjut lebih dari 2-3 minggu.',
            ],
            [
                'kode' => 'P03',
                'nama' => 'Berat',
                'nilai_min' => 0.81,
                'nilai_max' => 1.00,
                'persentase_min' => 81.00,
                'persentase_max' => 100.00,
                'saran' => 'Sangat disarankan untuk segera berkonsultasi dengan dokter atau tenaga kesehatan profesional, karena gangguan tidur pada tingkat ini dapat memengaruhi kesehatan fisik dan mental secara signifikan.',
            ],
        ];

        foreach ($data as $row) {
            TingkatInsomnia::updateOrCreate(['kode' => $row['kode']], $row);
        }
    }
}
