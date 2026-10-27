<?php

namespace App\Services;

use App\Models\Aturan;
use App\Models\TingkatInsomnia;

class CertaintyFactorService
{
    /**
     * Menghitung identifikasi tingkat gangguan tidur dengan metode Certainty Factor.
     *
     * @param array $inputs Array asosiatif [gejala_id => cf_user] hanya untuk gejala yang dipilih user,
     *                       urutan array menentukan urutan kombinasi CF (mengikuti urutan input pada form).
     *
     * @return array{
     *     cf_combine: float,
     *     persentase: float,
     *     tingkat: ?TingkatInsomnia,
     *     detail: array
     * }
     */
    public function hitung(array $inputs): array
    {
        $detail = [];
        $cfCombine = null;
        $urutan = 1;

        foreach ($inputs as $gejalaId => $cfUser) {
            $aturan = Aturan::where('gejala_id', $gejalaId)->first();

            // Jika belum ada rule CF untuk gejala ini, lewati (dianggap tidak berkontribusi)
            $cfPakar = $aturan ? (float) $aturan->nilai_cf_pakar : 0.0;
            $cfUser = (float) $cfUser;

            // CF(H,E) = CF_user x CF_pakar (rule)
            $cfHE = $cfUser * $cfPakar;

            // Kombinasi berurutan: CFcombine = CF1 + CF2 * (1 - CF1)
            if ($cfCombine === null) {
                $cfCombine = $cfHE;
            } else {
                $cfCombine = $cfCombine + $cfHE * (1 - $cfCombine);
            }

            $detail[] = [
                'gejala_id' => $gejalaId,
                'cf_pakar' => $cfPakar,
                'cf_user' => $cfUser,
                'cf_he' => $cfHE,
                'cf_combine_running' => $cfCombine,
                'urutan' => $urutan++,
            ];
        }

        $cfCombine = $cfCombine ?? 0.0;
        $persentase = round($cfCombine * 100, 2);

        $tingkat = TingkatInsomnia::where('persentase_min', '<=', $persentase)
            ->where('persentase_max', '>=', $persentase)
            ->orderBy('persentase_min')
            ->first();

        return [
            'cf_combine' => round($cfCombine, 6),
            'persentase' => $persentase,
            'tingkat' => $tingkat,
            'detail' => $detail,
        ];
    }
}
