<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilIdentifikasiDetail extends Model
{
    use HasFactory;

    protected $table = 'hasil_identifikasi_detail';

    protected $fillable = [
        'hasil_identifikasi_id',
        'gejala_id',
        'cf_pakar',
        'cf_user',
        'cf_he',
        'urutan',
    ];

    protected $casts = [
        'cf_pakar' => 'float',
        'cf_user' => 'float',
        'cf_he' => 'float',
    ];

    public function hasilIdentifikasi()
    {
        return $this->belongsTo(HasilIdentifikasi::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
