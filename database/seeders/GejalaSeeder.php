<?php

namespace Database\Seeders;

use App\Models\Aturan;
use App\Models\Gejala;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['G001', 'Kesulitan memulai tidur', 0.8],
            ['G002', 'Sering bangun di tengah malam dan tidak mudah kembali terlelap', 0.8],
            ['G003', 'Terbangun lebih awal dari waktu yang diharapkan dan tidak dapat tidur kembali', 0.6],
            ['G004', 'Tidur tidak memberikan rasa segar meskipun durasi tidur sudah cukup', 0.6],
            ['G005', 'Tidak puas terhadap kualitas dan jumlah tidur', 0.5],
            ['G006', 'Merasakan ketegangan atau ketidaknyamanan fisik akan tidur', 0.5],
            ['G007', 'Pikiran terus menerus atau sulit dihentikan saat mencoba tidur', 0.4],
            ['G008', 'Merasa lelah, lesu, atau tidak bertenaga', 0.5],
            ['G009', 'Mengantuk berlebihan pada siang hari', 0.6],
            ['G010', 'Gangguan perhatian, konsentrasi, atau daya ingat', 0.3],
            ['G011', 'Gangguan suasana hati dan mudah marah', 0.2],
            ['G012', 'Penurunan motivasi, energi, dan inisiatif dalam beraktivitas', 0.2],
            ['G013', 'Penurunan kinerja dalam aktivitas sosial, akademik, atau pekerjaan', 0.3],
            ['G014', 'Lebih mudah melakukan kesalahan atau mengalami kecelakaan', 0.2],
            ['G015', 'Merasa khawatir dan cemas terhadap kondisi tidurnya', 0.3],
            ['G016', 'Membutuhkan tidur siang agar dapat berfungsi atau beraktivitas secara optimal', 0.5],
        ];

        foreach ($data as [$kode, $nama, $nilaiCf]) {
            $gejala = Gejala::updateOrCreate(
                ['kode_gejala' => $kode],
                ['nama_gejala' => $nama]
            );

            Aturan::updateOrCreate(
                ['gejala_id' => $gejala->id],
                ['nilai_cf_pakar' => $nilaiCf]
            );
        }
    }
}
