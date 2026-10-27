<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatInsomnia extends Model
{
    use HasFactory;

    protected $table = 'tingkat_insomnia';

    protected $fillable = [
        'kode',
        'nama',
        'nilai_min',
        'nilai_max',
        'persentase_min',
        'persentase_max',
        'saran',
    ];

    protected $casts = [
        'nilai_min' => 'float',
        'nilai_max' => 'float',
        'persentase_min' => 'float',
        'persentase_max' => 'float',
    ];

    public function hasilIdentifikasi()
    {
        return $this->hasMany(HasilIdentifikasi::class);
    }
}
